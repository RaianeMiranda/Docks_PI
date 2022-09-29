<?php

session_start();
include "../include/mysql.php";

$codEtapas = "";
$codSnowflake = "";
$nome_snow = "";
$descricao = "";


$codEtapas_Erro = "";
$codSnowflake_Erro = "";
$codEtapas_Erro = "";
$nomeEtapas_Erro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codSnowflake = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM SNOWFLAKE WHERE codSnowflake= ?");
    if ($sql->execute(array($codSnowflake))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $nome_snow = $value['nome_snow'];
            $codSnowflake = $value['codSnowflake'];
            $descricao = $value['descricao'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) { //se isso for verdadeiro e isso prossiga
        if (!empty($_POST['nome_snow']))
     $nome_snow = $_POST['nome_snow'];

    if (!empty($_POST['descricao']))
     $descricao = $_POST['descricao'];

    if ($nome_snow || $descricao) {

        $sql = $pdo->prepare("UPDATE SNOWFLAKE SET codSnowflake = ? , nome_snow = ? , descricao = ? WHERE codSnowflake  = ?");

        if ($sql->execute(array($codSnowflake, $nome_snow, $descricao, $codSnowflake))) {
            $_SESSION['codSnowflake'] = $codSnowflake;
            $msgErro = "Dados alterados com sucesso!";
            header('location:listEtapa_adm.php'); //acima de header não pode ter echo de forma alguma
        } else {
            $msgErro = "Dados não salvados!";
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
            <input type="text" name="nome_snow" value="<?php echo $nome_snow ?>">
            <br>
            Descrição da etapa do Snowflake: <br>
            <textarea id="texto" type="text" name="descricao" ><?php echo $descricao ?></textarea>
            <br>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
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