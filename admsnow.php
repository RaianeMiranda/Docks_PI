<?php
session_start();
include "include/mysql.php";

$value="";
$codSnowflake="";
$texto = "";
$msgErro="";
$nome_etapas="";

//etapass
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $texto = $_POST['texto'];
        $nome_fase =$_POST['nome_fase'];
        $sql = $pdo->prepare("INSERT INTO etapas (codEtapas, codSnowflake, codLivro, descricao, nome_etapas)
VALUES (null, ?, ?, ?, ?)");
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
            nome da etapa:<input type="texto" name="nome_fase" value="<?php echo $nome_etapas?>">
            <br>
            <br>
            <br>
            descrição de fase:<textarea name="texto" value="<?php echo $texto ?>"></textarea>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <?php echo $msgErro ?>
</body>

</html>