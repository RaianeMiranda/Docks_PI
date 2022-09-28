<?php
session_start();
include "include/MySql.php";

$nomeLivro = "";

$nomeLivroErro = "";
$msgErro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);

            if (empty($_POST['nome']))
                $nomeLivroErro = "Nome é obrigatório!";
            else
                $nomeLivro = $_POST['nome'];

            if ($nomeLivro) {
                //Verificar se ja existe o idEmail
                $sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
                if ($sql->execute(array($nomeLivro))) {
                    if ($sql->rowCount() <= 0) {
                        $sql = $pdo->prepare("INSERT INTO LIVROS (codLivro, nomeLivro, capaLivro, idEmail)
                                                VALUES (NULL, ?, ?, ?)");
                        $result = $sql->execute(array($nomeLivro, $imgContent, $_SESSION['idEmail']));
                        if ($result) {
                            $msgErro = "Dados salvados com sucesso!";
                            $_SESSION['nomeLivro'] = $nomeLivro;
                            $nomeLivro = "";
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
        } else {
            $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
        }
    } else {
        $msgErro = "Imagem não selecionada!!";
    }
}

$msgErro = "";
$titulo = "Página inicial";

?>

<?php include "head.php";?>
<header>
    <?php if (isset($_GET['id'])) {
        $nomeLivro = $_GET['id'];
        $sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
        if ($sql->execute(array($nomeLivro))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($info as $key => $value) {
                $_SESSION['nomeLivro'] = $value['nomeLivro'];
            }
        }
    }
    ?>
    <?php if ($_SESSION['nome'] != "") { ?>
        <h1 class="title_welcome">Bem vindo(a) <?php echo $_SESSION['nome'] ?>!!</h1>
    <?php } else {
        header('location:index.php');
    } ?>


    <?php if (@$_SESSION['nomeLivro'] != "") { ?>
        <h3 class="before_course">Continue escrevendo: <span class="nome"><?php echo @$_SESSION['nomeLivro'] ?></span></h3>
    <?php } else { ?>
        <h3 class="before_course">Para desbloquear as fases, crie ou <a class="nome" href="list_livro.php"><span class="nome">selecione</span></a> um livro</h3>
        <button class="criar_livro" type="submit" id="myBtn"> + Criar novo Livro</button>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <?php include "cad_book.php"; ?>

        </div>

    <?php } ?>
</header>
<main>
    <?php
    include "cards/card_heroi.php";
    include "cards/card_snowflake.php";
    include "cards/card_mundo.php";
    include "cards/card_persona.php";
    ?>
<br>
<br>
<br>

    <?php if (@$_SESSION['nomeLivro'] != "") {
        include "list_capitulo.php" ?>

        <button type="button" class="button-cap"> <a class="criar-cap" href="cad_cap.php">
                + Adicionar novo capítulo
            </a>
        </button>


    <?php } ?>

</main>



<?php
include "footer.php"
?>