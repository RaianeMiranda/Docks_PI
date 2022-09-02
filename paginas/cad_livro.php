<?php
    include "../include/MySql.php";
    session_start();
    $nomeLivro = "";

    $nomeLivroErro = "";
    $msgErro = "";
echo "aqui:".$_SESSION['idEmail'];
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        if (!empty($_FILES["image"]["name"])) {
            //Pegar informações do arquivo
            $fileName = basename($_FILES['image']['name']);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            //Array de extensoes permitidas
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileType, $allowTypes)) {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = file_get_contents($image);

                if (empty($_POST['nome']))
                    $nomeLivroErro = "Nome é obrigatório!";
                else
                    $nomeLivro = $_POST['nome'];

                if ($nomeLivro) {
                    //Verificar se ja existe o idEmail
                    $sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
                    if ($sql->execute(array($nomeLivro))) {
                        if ($sql->rowCount() <= 0) {
                            $sql = $pdo->prepare("INSERT INTO LIVROS (codLivro, nomeLivro, capaLivro, idEmail)
                                                VALUES (NULL, ?, ?, ?)");
                            if ($sql->execute(array($nomeLivro, $imgContent, $_SESSION['idEmail']))) {
                                $msgErro = "Dados cadastrados com sucesso!";
                                $_SESSION['nomeLivro'] =$nomeLivro;
  
                                $nomeLivro = "";  
                                //header('location:../inicial.php');
                            } else {
                                $msgErro = "Dados não cadastrados!";
                            }
                        } 
                    } else {
                        $msgErro = "Erro no comando SELECT!";
                    }
                } else {
                    $msgErro = "Dados não cadastrados!";
                }
            } else {
                $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
            }
        } else {
            $msgErro = "Imagem não selecionada!!";
        }
    }

    ?> <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Usuário</title>
        <link rel="stylesheet" href="../css/estilo.css">
    </head>

    <body>
        <form method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Cadastro de Livros</legend>

                Nome: <input type="text" name="nome" value="<?php echo   $nomeLivro ?>">
                <span class="obrigatorio">*<?php echo   $nomeLivroErro ?></span>
                <br>
                <input type="file" name="image">
                <br>
                <input type="submit" value="Salvar" name="submit">
            </fieldset>
        </form>
        <span><?php echo $msgErro ?></span>
        <h3><a href="../inicial.php">Principal</a></h3>
    </body>

    </html>