<?php
session_start();
include "include/MySql.php";

$codPersonagens = "";
$msgErro = "";
$descricao = "";
$nome_persona = "";
$codLivro = "";
$texto = "";


$sql = $pdo->prepare('SELECT * FROM livros WHERE codLivro=?');
if ($sql->execute(array('5'))) { //no Lugar do '5' inserir a session do livro
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
        }
    }

    if (isset($_GET['id'])) {
        $codPersonagens = $_GET['id'];
        $sql = $pdo->prepare('SELECT * FROM PERSONAGENS WHERE codPersonagens=?'); //where codlivro = sessao
        if ($sql->execute(array($codPersonagens))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($info as $key => $value) {
                $codPersonagens = $value['codPersonagens'];
                $descricao = $value['descricao'];
                $nome = $value['nome_persona'];
                //  echo $value['codPersonagens'];
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    if (isset($_POST['texto']))
        $texto = $_POST['texto']; //TEXTO QUE VEM DO BANCO, arrumar o inseriri etapas para enviar ao banco e deixar o texto na tela
    else
        $msgErro = "Sem texto";

    if (isset($_POST['nome_persona']))
        $nome_persona = $_POST['nome_persona']; //TEXTO QUE VEM DO BANCO, arrumar o inseriri etapas para enviar ao banco e deixar o texto na tela
    else
        $msgErro = "Sem texto";

    //_SESSION['nomeLivro'] = 1;
    $sql = $pdo->prepare(" UPDATE PERSONAGENS SET  codPersonagens=?, nome_persona=?, codLivro=?, descricao=? WHERE codPersonagens=?");
    if ($sql->execute(array($codPersonagens, $nome_persona, "1", $texto, $codPersonagens,))) {
        $msgErro = "Dados cadastrados com sucesso!";
        $_SESSION['codPersonagens'] = $codPersonagens;
        $codPersonagens = "";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Docks</title>
</head>

<body>
    <section class="container">
        <div class="persona">
            <div class="p">
                <nav class="parte1">
                    <ul>
                        <li class="voltar"><a href="#"><img src="assets/images/voltar.png"></a></li>
                        <li class="nome-conteudo"><b>Criação de Personagem</b></li>
                        <li class="menu"><b>Menu</b></li>
                    </ul>
                </nav>
                <hr class="hr-personagem">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="fase">
                        <p class="titulo"><b>
                                <?php
                                if ($nome_persona == "") { ?>
                                    Nome do Personagem: <input type="texto" name="nome_persona" class="input-nome" value="<?php echo $nome ?>">
                                <?php
                                } else { ?>
                                    <input type="texto" name="nome_persona" class="input-nome" value="<?php echo $nome_persona; ?>"><?php } ?>
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