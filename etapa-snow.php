<?php
session_start();
include "include/MySql.php";

$codEtapas = "";
$nome_etapas = "";
$codLivro = "";
$descricao = "";
$texto = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codSnowflake = $_GET['id'];
    $sql = $pdo->prepare('SELECT * FROM snowflake WHERE codSnowflake=?');
    if ($sql->execute(array($codSnowflake))) { //no lugar do '6' confirmar a session do snowflake
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($info) > 0) {
            foreach ($info as $key => $values) {
                $_SESSION['codSnowflake'] = $values['codSnowflake'];
                $_SESSION['nome_snow'] = $values['nome_snow'];
                $_SESSION['descricao'] = $values['descricao'];
                $descricao = "";
            }
        }
        if (isset($_GET['id'])) {
            $codSnowflake = $_GET['id'];
            $sql2 = $pdo->prepare('SELECT * FROM ETAPAS where codSnowflake=? '); //where codlivro = sessao
            if ($sql2->execute(array($codSnowflake))) {
                $info2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

                foreach ($info2 as $key => $values2) {
                    $codEtapas = $values2['codEtapas'];
                    $nome_etapas = $values2['nome_etapas'];
                    $texto = $values2['descricao'];
                    //  echo $values['codEtapas'];
                }
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

    $sql = $pdo->prepare(" UPDATE ETAPAS SET  codEtapas=?, nome_etapas=?, codLivro=?, descricao=? WHERE codEtapas=?");
    if ($sql->execute(array($codEtapas, $nome_etapas, $_SESSION['codLivro'], $texto, $codEtapas,))) {
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
                <section class="parte1-snow">
                    <ul>
                        <li class="voltar-snow"><a href="inicial.php"><img src="assets/images/voltar.png"></a></li>
                        <li class="snow"><b>Snowflake</b></li>
                        <li><a class="menu" href="inicial.php"><b>Menu</b></a></li>
                    </ul>
                </section>
                <hr class="hr-snow">
                <div class="titulo1-snow">
                    <h1>
                        <?php
                        echo $values['nome_snow'];
                        ?>
                    </h1>
                </div>
                <div class="texto1-snow">
                    <div class="parte2-snow">
                        <?php
                        echo $values['descricao'];
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
                        <input type="submit" values="Salvar" name="submit" class="salvar1-snow">

                    </div>
                    <div>
                        <textarea id="texto" name="texto"><?php
                                                            if ($texto == "") {
                                                                echo "Comece a escrever a sua história!!";
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