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
                    $_SESSION['administrador'] = '';
                }
                header('location:inicial.php');
            } else {
                $msgErro = "Usuário não cadastrado!";
            }
        } else {
            $msgErro = "Usuário não cadastrado!";
        }
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
        <div class="container_inicial2">
            <div class="image_top">
                <img class="logo-img" src="assets/images/docks.png" alt="">
            </div>
            <div class="bem-vindo">
                <h1 class="slogan">Bem vindo(a) ao Docks</h1>
                <p class="slogan">Aqui é o lugar para suas histórias</p>
            </div>
            <fieldset class="form-fieldset">
                <legend for="idEmail">Digite seu E-mail</legend>
                <input type="text" id="idEmail" name="idEmail" placeholder="E-mail">
            </fieldset>
            <fieldset class="form-fieldset">
                <legend for="Senha">Digite sua Senha</legend>
                <input type="password" id="Senha" name="senha" placeholder="Insira sua senha">
            </fieldset>
            <div class="btn-continuar">
                <input type="submit" name="continuar" id="continuar" value="Continuar" class="continuar">
            </div>
            <p class="ou">OU</p>
            <fieldset>
                <div class="flex">
                    <img class="icon-login" src="assets/images/facebook.png" alt="Faça seu login com o Facebook">
                    <a href="#"><button class="login-with">Continuar com o Facebook </button></a>
                </div>
            </fieldset>
            <fieldset>
                <div class="flex">
                    <img class="icon-login" src="assets/images/google.png" alt="Faça seu login com o Facebook">
                    <a href="#"><button class="login-with">Continuar com o Google </button></a>
                </div>
            </fieldset>
            <p class="membro2">Ainda não é um membro?<a href="paginas/cad_usuario.php" class="membro-cadastro2"> Criar uma conta</a></p>
        </div>
</body>

</html>
