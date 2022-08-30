<?php
include "include/MySql.php";
session_start();
echo "aqui:" . $_SESSION['idEmail'];
echo "aqui:" . $_SESSION['nomeLivro'];

if (isset($_SESSION['nomeLivro'])) {
    echo "Continue escrevendo:" . $_SESSION['nomeLivro'];
} else {
    echo "Para desbloquear as fases, crie um livro";
}


/*                $sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
                if ($sql->execute(array($nomeLivro))) {
                    if ($sql->rowCount() <= 0) {
                        $sql = $pdo->prepare("INSERT INTO LIVROS (nomeLivro, capaLivro, idEmail)
                                                VALUES (?, ?, ?)");
                        if ($sql->execute(array($_SESSION['nomeLivro'], $_SESSION['idEmail']))) {
                            $msgErro = "Dados cadastrados com sucesso!";
                            //header('location:../inicial.php');
                        } else {
                            $msgErro = "aqui:" . $_SESSION['nomeLivro'];
                        }
                    }
                }*/
?>


<link rel="stylesheet" href="assets/css/inicial.css">
<?php include "head.php" ?>
<header>
    <h1 class="title_welcome">Bem vindo(a), escritor(a)</h1>
    <h3 class="before_course">Para desbloquear as fases, crie um livro</h3>
    <a href="paginas/cad_livro.php"><button class="criar_livro" type="submit"> <i class="fa-solid fa-plus"></i> Criar novo Livro</button></a>
</header>
<main>
    <?php
    include "card_heroi.php";
    include "card_snowflake.php";
    include "card_mundo.php";
    include "card_persona.php";
    ?>

</main>

<?php
include "footer.php"
?>