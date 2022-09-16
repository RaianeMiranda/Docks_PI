<?php
include "include/MySql.php";
session_start();
$msgErro= "";
$titulo = "Página inicial";
$nomeLivro="";


$sql = $pdo->prepare('SELECT * FROM livros WHERE idEmail=?');
if ($sql->execute(array($_SESSION['idEmail']))) {
  $info = $sql->fetchAll(PDO::FETCH_ASSOC);
  if (count($info) > 0) {
    foreach ($info as $key => $values) {
      $_SESSION['nomeLivro'] = $nomeLivro;
      $nomeLivro = "";
    }
    //header('location:paginas/list_usuario.php');
  }
}

?>



<link rel="stylesheet" href="assets/css/inicial.css">
<link rel="stylesheet" href="assets/css/modal.css">
<?php include "head.php" ?>
<header>
    <?php if (isset($_GET['id'])) {
        $nomeLivro = $_GET['id'];
        $sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
        if ($sql->execute(array($nomeLivro))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($info as $key => $value) {
                $_SESSION['nomeLivro'] = $nomeLivro;
                $nomeLivro = "";
            }
        }
    }
    ?>
    <?php if ($_SESSION['nome'] != "") { ?>
        <h1 class="title_welcome">Bem vindo(a) <?php echo $_SESSION['nome'] ?>!!</h1>
    <?php } else { ?>
        <h1 class="title_welcome">Voce não está logado!!</h1>
        <h3><a href="login.php">Login</a></h3>
    <?php } ?>

    <?php if ($_SESSION['nomeLivro'] != "") { ?>
        <h3 class="before_course">Continue escrevendo: <span class="nome_livro"><?php echo $_SESSION['nomeLivro'] ?></span></h3>
    <?php } else { ?>
        <h3 class="before_course">Para desbloquear as fases, crie um livro</h3>
        <a href="paginas/cad_book.php"><button class="criar_livro" type="submit"> <i class="fa-solid fa-plus"></i> Criar novo Livro</button></a>
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
        include "paginas/list_capitulo.php"?>
         <button id="myBtn">+ Adicionar novo Capítulo</button>

         <!-- The Modal -->
         <div id="myModal" class="modal">
     
             <!-- Modal content -->
             <?php include "paginas/cad_capitulo.php";?>
     
         </div>
        
   <?php } ?>

</main>



<?php
include "footer.php"
?>