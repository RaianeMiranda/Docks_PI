<?php
session_start();
include "include/mysql.php";

$value="";
$codMundo="";
$texto = "";
$msgErro="";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $texto = $_POST['texto'];
        $sql = $pdo->prepare("INSERT INTO MUNDO (codMundo, codLivro, descricao)
        VALUES ( null,?,?)");
        if ($sql->execute(array('1', $texto))) {
            $msgErro = "Dados cadastrados com sucesso!";
            $_SESSION['codMundo'] = $codMundo;
            $codMundo="";
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
            <legend>cadastro de descricao de mundo</legend>
            <br>
            texto personagem:<textarea name="texto" value="<?php echo $texto ?>">
</textarea>
            <button type="submit" value="Salvar" name="submit">Salvar</button>
        </fieldset>
    </form>
    <?php echo $msgErro ?>
</body>

</html>