<?php
session_start();
include "include/MySql.php";
$codCapitulo = "";
$nome_cap = "";
$codLivro = "";
$descricao = "";
$texto = "";
$msgErro = "";

$sql = $pdo->prepare('SELECT * FROM livros WHERE codLivro=?');
if ($sql->execute(array($_SESSION['codLivro']))) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
        }
    }

    if (isset($_GET['id'])) {
        $codCapitulo = $_GET['id'];
        $sql = $pdo->prepare('SELECT * FROM CAPITULO WHERE codCapitulo=? '); //where codlivro = sessao
        if ($sql->execute(array($codCapitulo))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($info as $key => $value) {
                $codCapitulo = $value['codCapitulo'];
                $nome_cap = $value['nome_cap'];
                $descricao = $value['descricao'];
                //  echo $value['codCapitulo'];
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    if (isset($_POST['texto']))
        $texto = $_POST['texto'];
    else
        $msgErro = "Sem texto";

    if (isset($_POST['nome_cap']))
        $nome_cap = $_POST['nome_cap'];
    else
        $msgErro = "Sem texto";

    //_SESSION['nomeLivro'] = 1;
    $sql = $pdo->prepare("SELECT * FROM CAPITULO WHERE nome_cap = ?");
    if ($sql->execute(array($nome_cap))) {
        if ($sql->rowCount() <= 0) {
            $sql = $pdo->prepare("INSERT INTO CAPITULO (codCapitulo, codLivro, nome_cap, descricao)
                                            VALUES (NULL, ?, ?, ?)");
            if ($sql->execute(array($_SESSION['codLivro'], $nome_cap, $texto))) {
                $msgErro = "Dados salvados com sucesso!";
                $_SESSION['nome_cap'] = $nome_cap;
                $nome_cap = "";
                header("location:inicial.php");
            } else {
                $msgErro = "Dados não salvados!";
            }
        }
    } else {
        $msgErro = "Erro no comando SELECT!";
    }
} else {
    $msgErro = "Dados não salvados!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include "head.php";
 $titulo="Cadastro de capítulo";
 ?>

<link rel="stylesheet" href="assets/css/cads_usuario.css">

<body>
    <section class="container">
        <div class="capitulo">
            <div class="p">
                <section class="parte_cap">
                    <ul>
                        <li class="voltar"><a href="#"><img src="assets/images/voltar.png"></a></li>
                        <li class="nome-conteudo"><b>Escrevendo capítulo</b></li>
                        <li><a class="menu" href="inicial.php"><b>Menu</b></a></li>
                    </ul>
                </section>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="fase">
                        <p class="titulo"><b>
                                <?php

                                //FAZER UM LOOP PARA ENUMERAR OS CAPÍTULOS EM UM SMALL
                                //COLOCAR OS CAPITULOS EM UM INPUT TYPE="SUBMIT" PARA IR PARA A PÁGINA DE CADASTRO DA DESCRICAO
                                if ($nome_cap == "") { ?>
                                    Nome do capítulo: <input type="texto" name="nome_cap" class="input-nome" value="<?php echo @$value['nome_cap'] ?>"> <?php
                                                                                                                                                    } else { ?>
                                    Nome do capítulo: <input type="texto" name="nome_cap" class="input_nome" value="<?php echo @$nome_cap; ?>"><?php } ?>
                            </b></p>
                        <input type="submit" class="save-cap" name="submit" value="salvar" class="salvar">
                    </div>
                    <hr class="hr-cap">
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
<?php
include "footer.php";
?>