<?php
session_start();
include "include/mysql.php";

$codSnowflake = "";
$descricao = "";
$msgErro="";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $descricao = $_POST['descricao'];
        $_SESSION['nomeLivro'] = 1;
        $sql = $pdo->prepare("INSERT INTO snowflake ( codSnowflake, descricao)
        VALUES ( null,?,?)");
        if ($sql->execute(array( $_SESSION['nomeLivro'], $descricao))) {
            $msgErro = "Dados cadastrados com sucesso!";
            $_SESSION['codSnowflake'] = $value['codSnowflake'];
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
            descrição de fase:<textarea name="descricao" value=""><?php echo $descricao ?>
</textarea>
            <button type="submit" name="submit" class="salvar1-mundo"><b> Salvar </b></button>
        </fieldset>
    </form>
   </span>


</body>

</html>


