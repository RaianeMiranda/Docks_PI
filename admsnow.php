<?php
session_start();
include "include/mysql.php";

$value="";
$codSnowflake="";
$texto = "";
$msgErro="";

//etapass
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $texto = $_POST['texto'];
        $sql = $pdo->prepare("INSERT INTO snowflake (codSnowflake, descricao)
        VALUES ( null,?)");
        if ($sql->execute(array( $texto))) {
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
    <title>cadastro de usuário</title>
    <link rel="stylesheet">
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>cadastro de descricao de fase</legend>
            <br>
            nome da etapa:<input type="texto" name="texto" value="<?php echo $text?>">
            <br>
            <br>
            <br>
            descrição de fase:<textarea name="texto" value="<?php echo $texto ?>"></textarea>
            <input type="submit" value="Salvar" name="submit"></input>
        </fieldset>
    </form>
    <?php echo $msgErro ?>
</body>
funcionando
</html>