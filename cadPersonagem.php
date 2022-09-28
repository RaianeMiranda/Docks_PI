<?php
session_start();
include "include/MySql.php";

$codPersonagens = "";
$nome_persona = "";
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

    $sql = $pdo->prepare('SELECT * FROM PERSONAGENS WHERE codPersonagens=? '); //where codlivro = sessao
    if ($sql->execute(array('8'))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($info as $key => $values) {
            $codPersonagens = $values['codPersonagens'];
            $nome_persona = $values['nome_persona'];
            $descricao = $values['descricao'];
            $descricao = $descricao;
            $nome_persona = $nome_persona;
            //  echo $value['codPersonagens'];
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    if (isset($_POST['texto']))
        $texto = $_POST['texto'];
    else
        $msgErro = "Sem texto";

    if (isset($_POST['nome_persona']))
        $nome_persona = $_POST['nome_persona'];
    else
        $msgErro = "Sem texto";

    //_SESSION['nomeLivro'] = 1;
    $sql = $pdo->prepare("INSERT INTO PERSONAGENS (codPersonagens, codLivro, nome_persona, descricao)
    VALUES ( NULL, ?, ?, ?)");
    if ($sql->execute(array($_SESSION['codLivro'], $nome_persona, $texto))) {
        $msgErro = "Dados salvados com sucesso!";
        $_SESSION['codPersonagens'] = $codPersonagens;
        $codPersonagens = "";
    } else {
        $msgErro = "Dados não salvados!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    $titulo = "Criação de Personagem";
    include "head.php";

    ?>

    <link rel="stylesheet" href="assets/css/cads_usuario.css">
</head>

<?php
if ($_SESSION['codLivro'] == "") {
    echo "<h1>Crie ou <span><a href='inicial.php'>selecione</a></span> um livro!";
} else { ?>

    <body>
        <section class="container">
            <div class="personagem">
                <div class="p">
                    <section class="parte-persona">
                        <ul>
                            <li class="voltar"><a href="inicial.php"><img src="assets/images/voltar.png"></a></li>
                            <li class="nome-conteudo">
                                <h3><b>Criação de Personagem</b></h3>
                            </li>
                            <li><a class="menu" href="inicial.php"><b>Menu</b></a></li>
                        </ul>
                    </section>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="fase">
                            <h4 class="titulo"><b>
                                    <?php

                                    if ($nome_persona == "") { ?>
                                        Nome do Personagem: <input type="texto" name="nome_persona" class="input-nome" value="<?php echo $nome_persona ?>"> <?php
                                                                                                                                                        } else { ?>
                                        Nome do Personagem: <input type="texto" name="nome_persona" class="input_nome" value="<?php echo $nome_persona; ?>"><?php } ?>
                                </b></h4>
                            <input type="submit" name="submit" value="salvar" class="salvar save-persona">
                        </div>
                        <hr class="hr-personagem">
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
    <?php
} ?>