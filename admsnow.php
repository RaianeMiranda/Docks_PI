<?php
session_start();
include "include/mysql.php";

$value="";
$codSnowflake="";
$texto = "";
$msgErro="";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $texto = $_POST['texto'];
        $sql = $pdo->prepare("INSERT INTO snowflake (codSnowflake, descricao)
        VALUES ( null,?)");
        if ($sql->execute(array( $texto))) {
            $msgErro = "Dados cadastrados com sucesso!";
            $_SESSION['codSnowflake'] = $codSnowflake;
            $codSnowflake="";
        } else {
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
            descrição de fase:<textarea name="texto" value="<?php echo $texto ?>">
</textarea>
            <button type="submit" value="Salvar" name="submit">Salvar</button>
        </fieldset>
    </form>
    <?php echo $msgErro ?>
</body>

</html>