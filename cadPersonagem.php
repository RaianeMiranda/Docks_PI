<?php
session_start();
include "include/mysql.php";

$value="";
$codPersonagens="";
$nome_persona = "";
$codLivro = "";
$texto = "";
$msgErro="";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $texto = $_POST['texto'];
        $sql = $pdo->prepare("INSERT INTO PERSONAGENS (codPersonagens, nome_persona, codLivro, descricao)
        VALUES ( NULL, NULL, ?, ?)");
        if ($sql->execute(array ('5', $texto))) {
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
    <title>Cadastro-Personagem</title>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>cadastro de descricao de Personagem</legend>
            <br>
           Descrição do Personagem:<br>
           <textarea  id="texto" name="texto" > <?php echo $texto ?>
        </textarea>
           <br>
           <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <?php echo $msgErro ?>
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