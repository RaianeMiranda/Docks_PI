<?php
/*
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
  if (isset($_POST['texto']))
      $texto = $_POST['texto'];//TEXTO QUE VEM DO BANCO
  else
      $msgErro = "Sem texto";
 
 $sql = $pdo->prepare("INSERT INTO ETAPAS (codEtapas, codSnowflake, codLivro, nome_etapas, descricao)
    valueS ( NULL, NULL, NULL, NULL, ?)");
   if ($sql->execute(array( $texto))) {
      $msgErro = "Dados salvados com sucesso!";
   } else {
      $msgErro = "Dados não salvados!";
    }
 }*/
?>

<?php
session_start();
include "include/MySql.php";

$codEtapas = "";
$nome_etapas = "";
$nome_snow = "";
$codLivro = "";
$descricao = "";
$texto2 = "";
$texto = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codSnowflake = $_GET['id'];
    $sql = $pdo->prepare('SELECT * FROM snowflake WHERE codSnowflake=?');
    if ($sql->execute(array($codSnowflake))) { //no lugar do '6' confirmar a session do snowflake
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($info) > 0) {
            foreach ($info as $key => $value) {
                $codSnowflake = $value['codSnowflake'];
                $nome_snow = $value['nome_snow'];
                $descricao = $value['descricao'];
            }
        }


        $sql2 = $pdo->prepare('SELECT * FROM ETAPAS where codEtapas=?'); //where codlivro = sessao
        if ($sql2->execute(array('1'))) {
            $info2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

            foreach ($info2 as $key => $value2) {
                $codEtapas = $value2['codEtapas'];
                $nome_etapas = $value2['nome_etapas'];
                $texto2 = $value2['descricao'];
                //  echo $value['codEtapas'];
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    if (isset($_POST['texto']))
        $texto = $_POST['texto'];
    else
        $msgErro = "Sem texto";

    if (isset($_POST['nome_etapas']))
        $nome_etapas = $_POST['nome_etapas'];
    else
        $msgErro = "Sem texto";

    //_SESSION['nomeLivro'] = 1;
    $sql = $pdo->prepare(" UPDATE ETAPAS SET  codEtapas=?,  codSnowflake=?, codLivro=?, nome_etapas =?, descricao=? WHERE codEtapas=?");
    if ($sql->execute(array($codEtapas, $codSnowflake, $_SESSION['codLivro'], $nome_etapas, $texto, $codEtapas))) {
        $msgErro = "Dados salvados com sucesso!";
        $_SESSION['codEtapas'] = $codEtapas;
        $codEtapas = "";
    } else {
        $msgErro = "Dados não salvados!";
    }
}

?>

<?php
$titulo = "Método Snowflake";
include "head.php";
?>

<link rel="stylesheet" href="assets/css/cads_usuario.css">

<body>
    <section class="container">
        <div class="row">
            <div class="col-md-6">
                <nav class="parte1-snow">
                    <ul>
                        <li class="voltar-snow"><a href="inicial.php"><img src="assets/images/voltar.png"></a></li>
                        <li class="snow"><b>Snowflake</b></li>
                        <li> <a class="menu-snow" href="inicial.php"><b>Menu</b></a></li>
                    </ul>
                </nav>
                <hr class="hr-snow">
                <div class="titulo1-snow">
                    <h1>
                        <?php
                        echo $nome_snow;
                        ?>
                    </h1>
                </div>
                <div class="texto1-snow">
                    <div class="descricao-snowflake">
                        <?php
                        echo $descricao;
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <nav class="parte2-snow">
                    <ul>
                        <div class="nome-livro-snow">
                            <li class="nomelivro1-snow"><b><?php echo $_SESSION['nomeLivro'] ?></b></li>
                        </div>
                    </ul>
                </nav>
                <hr class="hr-snow">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="botoes-snow">
                        <input type="submit" value="Salvar" name="submit" class="salvar1-snow">

                    </div>
                    <div>
                        <textarea id="texto" name="texto"><?php
                                                            if ($texto == "") {
                                                                echo $texto2;
                                                            } else  echo $texto;
                                                            ?>
                    </textarea>
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


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>