<?php

session_start();
include "include/mysql.php";

$codSnowflake = "";
$texto = "";
//$email = "";
//$telefone = "";
//$senha = "";

$textoErro = "";
//$emailErro = "";
//$telefoneErro = "";
//$senhaErro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codSnowflake = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM SNOWFLAKE WHERE codSnowflake = ?");
    if ($sql->execute(array($codSnowflake))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $codSnowflake = $value['codSnowflake'];
            $texto = $value['descricao'];
        
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {


    if (empty($_POST['descricao']))
        $textoErro = "texto é obrigatório";
    else
        $texto = $_POST['descricao'];



    ///if (empty($_POST['telefone']))
      //  $telefoneErro = "telefone é obrigatorio";
   // else
       // $telefone = $_POST['telefone'];

    //if (empty($_POST['senha']))
       // $senhaErro = "senha é obrigatirio";
    //else
       // $senha = $_POST['senha'];
}



?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>cadastro de usuário</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>cadastro de usuário</legend>
            nome da fase:<input type="text" name="texto" value="<?php echo $texto ?>">
            <br>
            descrição:<input type="text" name="texto" value="<?php echo $texto ?>">
   
            <input type="submit" value="salvar" name="submit">
            <br>
        </fieldset>
    </form>
    <?php echo $msgErro ?></span>


</body>
nao funcionando
</html>