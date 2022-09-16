<?php 

$codSnowflake ="";
$nome_etapas = "";
$descricao = "";
$codivro= "";
$msgErro= "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $descricao = $_POST['descricao'];
    $nome_etapas =$_POST['nome_etapas'] ;
    $sql = $pdo->prepare("INSERT INTO etapas (codEtapas, codSnowflake, codLivro, descricao, nome_etapas)
VALUES (?, ?, ?, ?,NULL,)");
if ($sql->execute(array($descricao, $nome_etapas))) {
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
</head>

<body>
    <h1>Cadastro de descrição da etapa Snowflake</h1>

    <form method="POST">
        <label>Nome da etapa:</label>
        <br>
        <input type="texto" name="nome_etapas" id="nome_etapas" value="<?php echo $nome_etapas?>">
        <br>
        <p>Descrição da etapa Snowflake:
            <br>
            <textarea type="texto" name="descricao" id="descricao" value="<?php echo $descricao?>"></textarea>
            <br>
            <br>
            <input type="submit" value="salvar" name="submit">



    </form>
    <?php echo $msgErro ?>
</body>

</html>