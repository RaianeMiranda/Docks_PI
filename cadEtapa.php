<?php
session_start();
include "include/mysql.php";

$value="";
$codSnowflake="";
$texto = "";
$msgErro="";
$nome_snow="";


    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $texto = $_POST['texto'];
        $nome_snow = $_POST['nome_snow'];
        $sql = $pdo->prepare("INSERT INTO snowflake (codSnowflake, nome_snow, descricao)
VALUES ( NULL, ?, ?)");
        if ($sql->execute(array($nome_snow, $texto))) {
            $msgErro = "Dados cadastrados com sucesso!";
            $_SESSION['codSnowflake'] = $codSnowflake;
            $codSnowflake="";
        }
         else {
            $msgErro = "Dados não cadastrados!";
        }
    }

    ?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>cadastro-Etapa</title>
    <link rel="stylesheet">
</head>

<body>
    <form method="POST">
        <fieldset >
            <legend>cadastro de descricao de fase</legend>
            <br>
            nome da etapa: <br>
            <input type="texto" name="nome_snow" value="<?php echo $nome_snow?>">
            <br>
            descrição de etapa:<br>
            <textarea id="texto" name="texto"><?php echo $texto ?></textarea>
            <br>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <?php echo $msgErro ?>
</body>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#texto'))
        .then(editor => {
            console.log(editor);

        })
        .catch(error => {
            console.error(error);
        });
    </script>
  
</html>