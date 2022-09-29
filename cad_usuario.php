<?php
include "include/MySql.php";
include "include/functions.php";
session_start();
$_SESSION['idEmail'] = "";
$_SESSION['nome'] = "";
$nome = "";
$idEmail = "";
$senha = "";
$administrador = "";

$nomeErro = "";
$idEmailErro = "";
$senhaErro = "";
$msgErro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['continuar'])) { //se isso for verdadeiro e isso prossiga
    if (empty($_POST['nome']))
        $nomeErro = "Nome é obrigatório";
    else
        $nome = $_POST['nome'];

    if (empty($_POST['idEmail']))
        $idEmailErro = "Email é obrigatório";
    else
        $idEmail = $_POST['idEmail'];

    if (empty($_POST['senha']))
        $senhaErro = "Senha é obrigatório";
    else
        $senha = $_POST['senha'];

    if (isset($_POST['administrador']))
        $administrador = 1;
    else
        $administrador = 0;

    if ($idEmail && $nome && $senha) { //se o email e o nome e[...] não estiverem preenhidos ele não irá prosseguir e aparecera o erro do else
        // verificar se já existe o email
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE idEmail =?");
        if ($sql->execute(array($idEmail))) {
            if ($sql->rowCount() <= 0) {
                $sql = $pdo->prepare("INSERT INTO USUARIO(nome, idEmail, senha, administrador) VALUES( ?, ?, ?, ?)");

                if ($sql->execute(array($nome, $idEmail, md5($senha), $administrador))) {
                    $msgErro = "Dados salvados com sucesso!";
                    $nome = "";
                    $idEmail = "";
                    $senha = ""; //isso serve para zerar as variáveis e não manter os dados no formulário
                    header('location:login.php'); //acima de header não pode ter echo de forma alguma
                } else {
                    $msgErro = "Dados não salvados!";
                }
            } else {
                $msgErro = "Email de usuário já cadastrado";
            }
        } else {
            $msgErro = "Erro no comando SELECT";
        }
    } else {
        $msgErro = "Dados não salvados!";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/login1.css">
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">


        <div class="container_inicial">
            <div class="image_top">
                <img class="logo-img" src="assets/images/docks.png" alt="">
            </div>
            <div class="bem-vindo">
                <h1 class="slogan">Bem vindo(a) ao Docks</h1>
                <p class="slogan">Aqui é o lugar para suas histórias</p>
            </div>
            <fieldset class="form-fieldset">
                <input type="text" name="nome" class="nome" placeholder="Nome">
            </fieldset>
            <fieldset class="form-fieldset">
                <input type="text" class="e-mail" name="idEmail" placeholder="E-mail">
            </fieldset>
            <fieldset class="form-fieldset">
                <input type="password" class="senha" name="senha" placeholder="Crie uma senha">
            </fieldset>
            <div class="btn-continuar">
                <input type="submit" name="continuar" class="continuar" value="Continuar" class="continuar">
            </div>
            <p class="ou">OU</p>
            <fieldset>
                <div class="flex">
                    <img class="icon-login" src="assets/images/facebook.png" alt="Faça seu login com o Facebook">
                    <a href="#"><button class="login-with">Cadastre-se com o Facebook </button></a>
                </div>
            </fieldset>
            <fieldset>
                <div class="flex">
                    <img class="icon-login" src="assets/images/google.png" alt="Faça seu login com o Facebook">
                    <a href="#"><button class="login-with">Cadastre-se com o Google </button></a>
                </div>
            </fieldset>
            <p class="membro-cadastro">Já é um membro? Entrar</p>
        </div>


    </form>
</body>

</html>
<!-- 
            <div class="login-meio">
            <label for="e-mail">E-mail</label>
            <input class="" type="text" name="idEmail" class="e-mail" placeholder="Digite seu E-mail">
            </div>
        -->