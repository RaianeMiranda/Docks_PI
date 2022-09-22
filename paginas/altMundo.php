<?php

session_start();
include  "include/mysql.php";

$codMundo = "";
$codLivro = "";
$descricao ="";

$msgErro = "";

if (isset($_GET['id'])) {
    $codMundo = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM MUNDO WHERE codMundo= ?");
    if ($sql->execute(array($codMundo))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $codMundo = $value['codMundo'];
            $codLivro = $value['codLivro'];
            $descricao = $value['descricao'];
          
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) { //se isso for verdadeiro e isso prossiga

    if (!empty($_POST['descricao']))
    $descricao = $_POST['descricao'];


    if ($descricao) {

        $sql = $pdo->prepare("UPDATE MUNDO SET  codMundo = ? , descricao = ? WHERE codMundo= ? ");

        if ($sql->execute(array($_SESSION['codMundo'], $descricao, $_SESSION['codMundo']))) {
            $_SESSION['codMundo'] = $codMundo;
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

    <title>Alteração Mundo</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <legend> Alteração de Descrição de Mundo</legend>
            <br>
            Descrição de Mundo: <br>
            <textarea id="texto" type="text" name="descricao"><?php echo $descricao ?></textarea>
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