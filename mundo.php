<?php
session_start();
include "include/MySql.php";

$value = "";
$codMundo = "";
$msgErro = "";
$descricao = "";

echo"aqui: ".  $_SESSION['codMundo'];

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $descricao = $_POST['descricao'];
    $sql = $pdo->prepare("INSERT INTO MUNDO (codMundo, codLivro, descricao)
    VALUES (NULL, ?, ?,)");
    if ($sql->execute(array('1', $descricao))) {
        $msgErro = "Dados cadastrados com sucesso!";
        $_SESSION['codMundo'] = $value['codMundo'];
    } else {
        $msgErro = "Dados não cadastrados!";
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Docks</title>
</head>

<body>
    <section class="container">
        <div class="mundo">
            <div class="m">
                <nav class="parte1-mundo">
                    <ul>
                        <li class="voltar-mundo"><a href="#"><img src="assets/images/voltar.png"></a></li>
                        <li class="mundo"><b>Criação de Mundo</b></li>
                        <li class="menu-mundo"><b>Menu</b></li>
                     
                    </ul>
                </nav>
                <hr class="hr-mundo">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="fase-mundo">
                        
                            <h1 class="titulo1-mundo"><b>Descreva seu Mundo aqui!!!</b></h1>
                        
                        <input type="submit" value="Salvar" name="submit"  class="salvar1-mundo">
                    </div>
                </form>

                <textarea class="descricao-mundo"> 

                    <?php
                    $sql = $pdo->prepare('SELECT * FROM MUNDO'); //where codlivro = sessao
                    if ($sql->execute()) {
                    $info = $sql->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($info as $key => $value) {
                        $_SESSION['codMundo'] = $value['codMundo'];
                        echo $value['descricao'];
                    }
                 }
                ?>
                    </textarea>

            </div>
        </div>
    </section>






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>