<?php
include "../include/MySql.php";
session_start();
$nomeLivro = "";
$nomeLivroErro = "";
$msgErro = "";
echo "aqui:" . $_SESSION['idEmail'];
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

                        $msgErro = "Erro no comando SELECT!";
                        if ($sql->execute(array($nomeLivro, $imgContent, $_SESSION['idEmail']))) {
                            $msgErro = "Dados cadastrados com sucesso!";
                            $_SESSION['nomeLivro'] = $nomeLivro;

                            $nomeLivro = "";
                            $_SESSION['imagem'] = $imgContent;

                            $imgContent = "";
                            //header('location:../inicial.php');
                        } else {
                            $msgErro = "Dados não cadastrados!";
                        }
                    }
                } else {
                    $msgErro = "Dados não cadastrados!";
                    $msgErro = "Erro no comando SELECT!";
                }
            } else {
                $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
                $msgErro = "Dados não cadastrados!";
            }
        } else {
            $msgErro = "Imagem não selecionada!!";
            $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
        }
    } else {
        $msgErro = "Imagem não selecionada!!";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Livros</title>
    <link rel="stylesheet" href="../assets/css/criar_livros.css">
</head>

<body>
    <div class="container">
        <div class="container-escrita">
            <h1 class="livro">Criar Livros</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="container-cores">
                    <div class="container-capa">
                        <?php if ('imagemTemp' != "") { ?>
                            <img src="" alt="" id="imagemTemp">
                        <?php } else { ?>
                            <img class="azul" src="../assets/images/azul.png">
                            <img class="verde" src="../assets/images/verde.png">
                            <img class="rosa" src="../assets/images/rosa.png">
                            <img class="laranja" src="../assets/images/laranja.png">
                            <img class="roxo" src="../assets/images/roxo.png">
                        <?php } ?>


                    </div>

                    <div class="container-criar">
                        <div class="juncao-botao1">
                            <label for="upload_image" class="capa">
                                <img class="botao" src="../assets/images/botao.png">
                            </label>
                            <input type="file" id="upload_image" name="image">
                        </div>
                    </div>
                    <div class="container-adicionar">
                        <h3 class="adicionar">Adicionando capa</h3>
                    </div>
                </div>
                <h2 class="titulo-criar_livros">Título</h2>
                <img src="" alt="" id="imagemTemp">
                <div class="botao-criar_livros">
                    <input type="text" name="nome" value="Adicione seu título">
                    <span class="obrigatorio"> * <?php echo   $nomeLivroErro ?></span>

                    <div class="botao-flex">
                        <input class="botao-salvar" type="submit" value="Salvar" name="submit">
                    </div>
                </div>
            </form>
            <script>
                const imgInp = document.getElementById("upload_image");
                const imagemTemp = document.getElementById("imagemTemp");

                imgInp.onchange = evt => {
                    const [file] = imgInp.files
                    if (file) {
                        imagemTemp.src = URL.createObjectURL(file)
                    }
                }
            </script>
            <span class="erro"><?php echo $msgErro ?></span>
</body>