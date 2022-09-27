<?php
session_start();
include "include/MySql.php";

$codMundo = "";
$nome_mundo = "";
$codLivro = "";
$descricao = "";
$texto = "";
$msgErro = "";

$sql = $pdo->prepare('SELECT * FROM livros WHERE codLivro=?');
if ($sql->execute(array('5'))) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
        }
    }

        $sql = $pdo->prepare('SELECT * FROM MUNDO WHERE codMundo=? '); //where codlivro = sessao
        if ($sql->execute(array('1'))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($info as $key => $values) {
                $codMundo = $values['codMundo'];
                $nome_mundo = $values['nome_mundo'];
                $descricao = $values['descricao'];
                $descricao = $descricao;
                $nome_mundo = $nome_mundo;
                //  echo $value['codMundo'];
            }
        }
    }


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    if (isset($_POST['texto']))
        $texto = $_POST['texto'];
    else
        $msgErro = "Sem texto";

    if (isset($_POST['nome_mundo']))
        $nome_mundo = $_POST['nome_mundo'];
    else
        $msgErro = "Sem texto";

    //_SESSION['nomeLivro'] = 1;
    $sql = $pdo->prepare("INSERT INTO MUNDO (codMundo, codLivro, nome_mundo, descricao)
    VALUES ( NULL, ?, ?, ?)");
    if ($sql->execute(array("1", $nome_mundo, $texto))) {
        $msgErro = "Dados cadastrados com sucesso!";
        $_SESSION['codMundo'] = $codMundo;
        $codMundo = "";
    } else {
        $msgErro = "Dados não cadastrados!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php
include "head.php";
?>

<body>
    <section class="container">
        <div class="persona">
            <div class="p">
                <nav class="parte1">
                    <ul>
                        <li class="voltar"><a href="#"><img src="assets/images/voltar.png"></a></li>
                        <li class="nome-conteudo"><b>Criação de Mundo</b></li>
                        <li class="menu"><b>Menu</b></li>
                    </ul>
                </nav>
                <hr class="hr-mundo">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="fase">
                        <p class="titulo"><b>
                                <?php

                                if ($nome_mundo == "") { ?>
                                    Nome do Mundo: <input type="texto" name="nome_mundo" class="input-nome" value="<?php echo $nome_mundo ?>"> <?php
                                                                                                                                                    } else { ?>
                                    <input type="texto" name="nome_mundo" class="input_nome" value="<?php echo $nome_mundo; ?>"><?php } ?>
                            </b></p>
                        <input type="submit" name="submit" value="salvar" class="salvar">
                    </div>
                    <textarea id="texto" name="texto">
                        <?php
                        if ($texto == "") {
                            echo $descricao;
                        } else echo $texto;
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