<?php

    session_start();
include "include/mysql.php";

$codEtapas = "";
$codSnowflake = "";
$codLivro = "";
$nome_etapas= "";
$descricao= "";


$codEtapas_Erro = "";
$codSnowflake_Erro = "";
$codLivro_Erro = "";
$codEtapas_Erro = "";
$nomeEtapas_Erro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codEtapas = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM ETAPAS WHERE codEtapas = ?");
    if ($sql->execute(array($codEtapas))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $nome_etapas = $value['nome_etapas'];
            $codSnowflake = $value['codSnowflake'];
            $descricao= $value['descricao'];
            $codEtapas = $value['codEtapas'];
            $codLivro = $value['codLivro'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) { //se isso for verdadeiro e isso prossiga
    if (empty($_POST['nome_etapas']))
        $nomeEtapas_Erro = "nome_etapas é obrigatório";
    else
        $nome_etapas = $_POST['nome_etapas'];


    if ($nome_etapas) { //se o codCapitulo e o nome_cap e[...] não estiverem preenhidos ele não irá prosseguir e aparecera o erro do else
        // verificar se já existe o codCapitulo

        $sql = $pdo->prepare("UPDATE ETAPAS SET nome_etapas = ?, codLivro = ?, codSnowflake = ? , descricao = ? WHERE codEtapas  = ?");

        if ($sql->execute(array($nome_etapas, $descricao, $codSnowflake, $codEtapas))) {
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
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <legend> alteraçaõ de cadastro de descrição</legend>
       Nome da etapa do Snowflake: <br>
       <input type="text" name="nome_etapas" value="<?php echo $nome_etapas ?>">
            <br>
        Descrição da etapa do Snowflake: <br>
        <textarea type="text" name="descricao" value="<?php echo $descricao?>"></textarea>
            

            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>