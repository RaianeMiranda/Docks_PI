<?php
session_start();
include "include/MySql.php";
$titulo = "Escrevendo capítulo";
$codCapitulo = "";
$msgErro = "";
$descricao = "";
$nome_cap = "";
$codLivro = "";
$texto = "";


$sql = $pdo->prepare('SELECT * FROM livros WHERE codLivro=?');
if ($sql->execute(array($_SESSION['codLivro']))) { //no Lugar do '5' inserir a session do livro
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
        }
    }

    if (isset($_GET['id'])) {
        $codCapitulo = $_GET['id'];
        $sql = $pdo->prepare('SELECT * FROM CAPITULO WHERE codCapitulo=?'); //where codlivro = sessao
        if ($sql->execute(array($codCapitulo))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($info as $key => $value) {
                $codCapitulo = $value['codCapitulo'];
                $descricao = $value['descricao'];
                $nome = $value['nome_cap'];
                //  echo $value['codCapitulo'];
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    if (isset($_POST['texto']))
        $texto = $_POST['texto']; //TEXTO QUE VEM DO BANCO, arrumar o inseriri etapas para enviar ao banco e deixar o texto na tela
    else
        $msgErro = "Sem texto";

    if (isset($_POST['nome_cap']))
        $nome_cap = $_POST['nome_cap']; //TEXTO QUE VEM DO BANCO, arrumar o inseriri etapas para enviar ao banco e deixar o texto na tela
    else
        $msgErro = "Sem texto";

    //_SESSION['nomeLivro'] = 1;
    $sql = $pdo->prepare(" UPDATE CAPITULO SET  codCapitulo=?, nome_cap=?, codLivro=?, descricao=? WHERE codCapitulo=?");
    if ($sql->execute(array($codCapitulo, $nome_cap, $_SESSION['codLivro'], $texto, $codCapitulo,))) {
        $msgErro = "Dados salvados com sucesso!";
        $_SESSION['codCapitulo'] = $codCapitulo;
        $codCapitulo = "";
    } else {
        $msgErro = "Dados não salvados!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
$titulo = "Criação de Personagem";
include "head.php";

?>
<link rel="stylesheet" href="assets/css/cads_usuario.css">

<body>
    <section class="container">
        <div class="capitulo">
            <div class="p">
                <section class="parte_cap">
                    <ul>
                        <li class="voltar"><a href="inicial.php"><img src="assets/images/voltar.png"></a></li>
                        <li class="nome-conteudo"><b>Escrevendo capítulo</b></li>
                        <li><b> <a class="menu" href="inicial.php"> Menu</b></a></li>
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