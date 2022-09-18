<?php

session_start();
include "include/mysql.php";

$codEtapas = "";
$codSnowflake = "";
$codLivro = "";
$nome_etapas = "";
$descricao = "";


$codEtapas_Erro = "";
$codSnowflake_Erro = "";
$codLivro_Erro = "";
$codEtapas_Erro = "";
$nomeEtapas_Erro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codEtapas = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM ETAPAS WHERE codEtapas= ?");
    if ($sql->execute(array($codEtapas))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $nome_etapas = $value['nome_etapas'];
            $codSnowflake = $value['codSnowflake'];
            $descricao = $value['descricao'];
            $codEtapas = $value['codEtapas'];
            $codLivro = $value['codLivro'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) { //se isso for verdadeiro e isso prossiga
    if (!empty($_POST['nome_etapas']))
     $nome_etapas = $_POST['nome_etapas'];

    if (!empty($_POST['descricao']))
     $descricao = $_POST['descricao'];

    if ($nome_etapas || $descricao) {

        $sql = $pdo->prepare("UPDATE ETAPAS SET codEtapas = ? , nome_etapas = ? , descricao = ? WHERE codEtapas  = ?");

        if ($sql->execute(array($_SESSION['codEtapas'], $nome_etapas, $descricao, $_SESSION['codEtapas']))) {
            $_SESSION['codEtapas'] = $codEtapas;
            $msgErro = "Dados alterados com sucesso!";
            //header('location:inicial.php'); //acima de header não pode ter echo de forma alguma
        } else {
            $msgErro = "Dados não cadastrados!";
        }
    } else {
        $msgErro = "Dados não alterados!";
    }
}


?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">

    <title>Alteração Etapa</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <legend> Alteração de Cadastro de Descrição do Snowflake</legend>
            Nome da etapa do Snowflake: <br>
            <input type="text" name="nome_etapas" value="<?php echo $nome_etapas ?>">
            <br>
            Descrição da etapa do Snowflake: <br>
            <textarea type="text" name="descricao"><?php echo $descricao ?></textarea>
            <br>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>