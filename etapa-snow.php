<?php
session_start();
include "include/MySql.php";


$msgErro = "";
$texto = "";
$nome_snow = "";
$codEtapas = "";
$descricao = "";


$sql = $pdo->prepare('SELECT * FROM snowflake '); //where codlivro = sessao
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($info as $key => $value) {
       
      //  echo $value['codPersonagens'];
     
    
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"])) {
  if (isset($_POST['descricao']))
      $texto = $_POST['descricao'];//TEXTO QUE VEM DO BANCO
  else
      $texto = "Sem texto";
 
 $sql = $pdo->prepare("INSERT INTO ETAPAS (codEtapas, codSnowflake, codLivro, nome_etapas, descricao)
    VALUES ( NULL, NULL, NULL, ?, ?)");
   if ($sql->execute(array( $_SESSION['codEtapas']))) {
      $msgErro = "Dados cadastrados com sucesso!";
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
        <div class="row">
            <div class="col-md-6">
                <nav class="parte1-snow">
                    <ul>
                        <li class="voltar-snow"><a href="#"><img src="assets/images/voltar.png"></a></li>
                        <li class="snow"><b>Snowflake</b></li>
                        <li class="menu-snow"><b>Menu</b></li>
                    </ul>
                </nav>
                <hr class="hr-snow">
                <div class="titulo1-snow">
                    <h1>
                        <?php
                      echo $value['nome_snow'];
                        ?>
                    </h1>
                </div>
                <div class="texto1-snow">
                    <div class="descricao-snowflake">
                        <?php
                          echo $value['descricao'];
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <nav class="parte2-snow">
                    <ul>
                        <div class="nome-livro-snow">
                            <li class="nomelivro1-snow"><b>Alice</b></li>
                        </div>
                    </ul>
                </nav>
                <hr class="hr-snow">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="botoes-snow">
                        <p class="fase1-snow"><b> Fase 1 </b></p>
                        <div class="salvinho">
                            <input type="submit" value="Salvar" name="submit" class="salvar1-snow">
                        </div>
                    </div>
                    <div>

                        <textarea id="texto" name="texto"><?php echo $texto ?></textarea>

                    </div>
                </form>
                <?php echo $msgErro ?>
            </div>
        </div>
    </section>

    <!-- Inicia o CK editor -->
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