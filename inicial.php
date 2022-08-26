<?php
include "include/MySql.php";
include "include/functions.php";

session_start();
$_SESSION['nome'] = "";
$_SESSION['administrador'] = "";

$idEmail = "";
$senha = "";
$msgErro = "";
$idEmailErro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['idEmail'])) {
        $idEmailErro = "idEmail é obrigatório";
    } else {
        $idEmail = test_input($_POST['idEmail']);
    }
    if (empty($_POST['senha'])) {
        $senhaErro = "Senha é obrigatório";
    } else {
        $senha = test_input($_POST['senha']);
    }

    if ($idEmail && $senha) {
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE idEmail=? AND senha=?"); //idEmail e a senha são validados com o banco de dados
        if ($sql->execute(array($idEmail, MD5($senha)))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (count($info) > 0) {
                foreach ($info as $key => $values) {
                    $_SESSION['nome'] = $values['nome'];
                    $_SESSION['idEmail'] = $values['idEmail'];
                    $_SESSION['administrador'] = '1';
                }
                header('location:paginas/list_usuario.php');
            } else {
                $msgErro = "Usuário não cadastrado!";
            }
        } else {
            $msgErro = "Usuário não cadastrado!";
        }
    }
}
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