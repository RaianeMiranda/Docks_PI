<?php
session_start();
include "include/mysql.php";

$codPersonagens="";
$value="";
$texto = "";
$msgErro="";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $texto = $_POST['texto'];
    $sql = $pdo->prepare("INSERT INTO PERSONAGENS (codPersonagens, nome_persona, codLivro, descricao)
    VALUES ( null,null,?,?)");
    if ($sql->execute(array('5', $texto))) {
        $msgErro = "Dados cadastrados com sucesso!";
        $_SESSION['codPersonagens'] = $codPersonagens;
        $codPersonagens="";
    } else {
        $msgErro = "Dados não cadastrados!";
    }
}

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet">
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>cadastro de descricao de personagem</legend>
            <br>
            texto personagem:<textarea name="texto" value="<?php echo $texto ?>">
</textarea>
            <button type="submit" value="Salvar" name="submit">Salvar</button>
        </fieldset>
    </form>
    <?php echo $msgErro ?>
</body>

</html>