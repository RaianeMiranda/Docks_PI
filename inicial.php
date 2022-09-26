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
                            $msgErro = "Dados cadastrados com sucesso!";
                            $_SESSION['nomeLivro'] = $nomeLivro;
                            $nomeLivro = "";
                        } else {
                            $msgErro = "Dados não cadastrados!";
                        }
                    }
                } else {
                    $msgErro = "Erro no comando SELECT!";
                }
            } else {
                $msgErro = "Dados não cadastrados!";
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


<?php include "head.php" ;
echo "aqui:". $_SESSION['idEmail'];?>
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
        <h3 class="before_course">Continue escrevendo: <span class="nome"><?php echo $_SESSION['nomeLivro'] ?></span></h3>
    <?php } else { ?>
        <h3 class="before_course">Para desbloquear as fases, crie ou <a href="paginas/list_livro.php"><span class="nome">selecione</span></a> um livro</h3>
        <button class="criar_livro" type="submit" id="myBtn"><i class="fa-solid fa-plus"></i> Criar novo Livro</button>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <?php include "paginas/cad_book.php"; ?>

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

    <h3><a href="paginas/logout.php">logout</a></h3>

    <?php if ($_SESSION['nomeLivro'] != "") {
        include "paginas/list_capitulo.php" ?>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa-solid fa-plus"></i> Criar capítulo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <?php include "paginas/cad_capitulo.php"; ?>
                    </div>

                </div>
            </div>
        </div>

    <?php } ?>

</main>



<?php
include "footer.php"
?>