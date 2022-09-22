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
        VALUES ( NULL,?,?)");
        if ($sql->execute(array ('1',$texto))) {
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
           Descrição do mundo:<br>
           <textarea id="texto" name="texto" > <?php echo $texto ?>
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