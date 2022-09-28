<?php

session_start();
include "include/mysql.php";

$codPersonagens = "";
$codLivro = "";
$descricao = "";

$msgErro = "";

if (isset($_GET['id'])) {
    $codPersonagens = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM PERSONAGENS WHERE codPersonagens= ?");
    if ($sql->execute(array($codPersonagens))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $codPersonagens = $value['codPersonagens'];
            $nome_persona = $value['nome_persona'];
            $codLivro = $value['codLivro'];
            $descricao = $value['descricao'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) { //se isso for verdadeiro e isso prossiga
if (!empty($_POST['descricao']))
     $descricao = $_POST['descricao'];

    if ($nome_persona || $descricao) {

        $sql = $pdo->prepare("UPDATE PERSONAGENS SET codPersonagens = ? , nome_persona = ? , descricao = ? WHERE codPersonagens  = ?");

        if ($sql->execute(array($_SESSION['codPersonagens'], $nome_persona, $descricao, $_SESSION['codPersonagens']))) {
            $_SESSION['codPersonagens'] = $codPersonagens;
            $msgErro = "Dados alterados com sucesso!";
            //header('location:inicial.php'); //acima de header não pode ter echo de forma alguma
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

    <title>Alteração Personagem</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <legend> Alteração de Cadastro da Descrição do Personagem</legend>
            Descrição do Personagem: <br>
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