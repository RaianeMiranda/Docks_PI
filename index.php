<?php 
session_start();
include "include/MySql.php";


$msgErro="";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
    $texto = $_POST['texto'];
    $_SESSION['nomeLivro'] = 1;
    $sql = $pdo->prepare("INSERT INTO etapas (codEtapas, codSnowflake, codLivro, descricao)
    VALUES (null, ?, ?, ?)");
    if ($sql->execute(array($_SESSION['codSnowflake'], $_SESSION['nomeLivro'], $texto))){
        $msgErro = "Dados cadastrados com sucesso!";
    } else {
        $msgErro = "Dados não cadastrados!";
    } 
} 
{
    $sql = $pdo->prepare("UPDATE etapas SET descricao = :descricao  WHERE codEtapas = :codEtapas");
 
  
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
    <section class="container1">
        <div class="item1">
            <nav class="parte1">
                <ul>
                    <li class="voltar1"><a href="#"><img src="assets/images/voltar.png"></a></li>
                    <li class="snow"><b>Snowflake</b></li>
                    <li class="menu"><b>Menu</b></li>
                </ul>
            </nav>
            <hr>
            <div class="titulo1">
                <h1><b>1. Faça seu livro em uma frase</b></h1>
            </div>
            <div class="texto1">
                <textarea>

                <?php
                
                $sql = $pdo->prepare('SELECT * FROM snowflake'); //where codlivro = sessao
                if ($sql->execute()){
                    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            
                    foreach($info as $key => $value){
                        $_SESSION['codSnowflake'] = $value['codSnowflake'];
                        echo $value['codSnowflake'];
                        echo $value['descricao'];
                    }
                }
                echo "rteste";
                ?>
                </textarea>
            </div>
        </div>
        <div class="vertical"></div>
        <div class="item2">
            <nav class="parte2">
                <ul>
                    <span onclick="openNav()">
                        <li class="expandir1"> <img src="assets/images/expandir.png"></li>
                    </span>
                    <?php 
                    include "expandir.php";
                    ?>
                </ul>
            </nav>
            <hr>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="botoes1">
                    <p class="fase1"><b> Fase 11 </b></p>
                    <button type="submit" name="submit" class="salvar1"><b> Salvar </b></button>
                    <!-- Botão para acionar modal -->
                    <button type="button" class="Aa1" data-toggle="modal" data-target="#modalExemplo">
                        <b>Aa</b>
                    </button>

                </div>
                <div class="texto2">
                    <textarea name="texto"><?php $texto?></textarea>

                </div>
            </form>
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
    <?php
                    include "modal.php";
                ?>
</body>

</html>