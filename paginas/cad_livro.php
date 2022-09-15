<?php
include "../include/MySql.php";
session_start();
$nomeLivro = "";
//DESCUBRA COMO COLOCAR O MODAL COM AS IMAGENS E COMO IDENTIFICAR OS ID'S NA MESMA PÁGINA
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
                        if ($sql->execute(array($nomeLivro, $imgContent, $_SESSION['idEmail']))) {
                            $msgErro = "Dados cadastrados com sucesso!";
                            $_SESSION['nomeLivro'] = $nomeLivro;

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

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Livros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/criar_livros.css">
</head>

<body>
    <div class="container">
        <div class="container-escrita">
            <h1 class="livro">Criar Livros</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="container-cores">
                    <div class="container-capa">
                        <img class="azul" src="../assets/images/azul.png">
                        <img class="verde" src="../assets/images/verde.png">
                        <img class="rosa" src="../assets/images/rosa.png">
                        <img class="laranja" src="../assets/images/laranja.png">
                        <img class="roxo" src="../assets/images/roxo.png">
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

<!--============================================T=R=O=U=X=A============================================================-->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="all-form">
                                <?php
                                $sql = $pdo->prepare('SELECT * FROM IMAGEM WHERE imagem=?');
                                if ($sql->execute(array('1'))) {
                                    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($info) > 0) {
                                        foreach ($info as $key => $values) {
                                            $_SESSION['imagem'] = $imagem;
                                            $imagem = "";
                                        }
                                        //header('location:paginas/list_usuario.php');
                                    }
                                    echo "<table border='1'>";
                                    echo "<tr>";
                                    echo "  <th>Imagem</th>";
                                    echo "  <th>Selecionar</th>";
                                    echo "  <th>Excluir</th>";
                                    echo "</tr>";
                                    foreach ($info as $key => $value) {
                                        echo "<tr>";
                                        echo "<td>" . $value['imagem'] . "</td>";
                                        echo '<td><img src="data:image/png;base64,' . base64_encode($value['capaLivro']) . '" />1</td>';
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="botao-salvar" type="submit" value="Salvar" name="submit">
                        </div>
                    </div>
                </div>
            </div>



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

 <!--============================================T=R=O=U=X=A============================================================-->
            <span class="erro"><?php echo $msgErro ?></span>


            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>