<?php
session_start();
include "include/mysql.php";

$value="";
$codEtapas="";
$texto = "";
$msgErro="";
$nome_etapas="";


    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $texto = $_POST['texto'];
        $nome_etapas = $_POST['nome_etapas'];
        $sql = $pdo->prepare("INSERT INTO etapas (codEtapas, codSnowflake, codLivro, nome_etapas, descricao)
VALUES ( NULL, NULL, NULL, ?, ?)");
        if ($sql->execute(array($nome_etapas, $texto))) {
            $msgErro = "Dados cadastrados com sucesso!";
            $_SESSION['codEtapas'] = $codEtapas;
            $codEtapas="";
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
            nome da etapa:<input type="texto" name="nome_etapas" value="<?php echo $nome_etapas?>">
            <br>
            <br>
            <br>
            descrição de etapa:<textarea name="texto" value="<?php echo $texto ?>"></textarea>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <?php echo $msgErro ?>
</body>

</html>