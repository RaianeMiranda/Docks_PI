<?php
include "../include/MySql.php";
session_start();
$imgContent = "";

$imgContentErro = "";
$msgErro = "";

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


            if ($imgContent) {
                //Verificar se ja existe o idEmail
                $sql = $pdo->prepare("SELECT * FROM IMAGEM WHERE imagem = ?");
                if ($sql->execute(array($imgContent))) {
                    if ($sql->rowCount() <= 0) {
                        $sql = $pdo->prepare("INSERT INTO IMAGEM (codImagem, imagem)
                                                VALUES (NULL, ?)");
                        if ($sql->execute(array($imgContent))) {
                            $msgErro = "Dados cadastrados com sucesso!";
                            $_SESSION['imagem_capa'] = $imgContent;
                            $imgContent = "";
                            //  header('location:../inicial.php');
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
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Cadastro de Imagem_capa</legend>

            <div class="juncao-botao1">
                <label for="upload_image" class="capa">Insira sua imagem</label>
                <input type="file" id="upload_image" name="image">
            </div>
            <img src="" alt="" id="imagemTemp">
            <br>
            <input type="submit" value="Salvar" id="upload_image" name="submit">
        </fieldset>
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
    <span><?php echo $msgErro ?></span>
</body>

</html>