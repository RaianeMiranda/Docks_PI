<?php
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
} ?>

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
    <form action="" method="POST">
        <div class="container_inicial2">
            <div class="image_top">
                <img class="logo-img" src="assets/images/docks.png" alt="">
            </div>
            <div class="bem-vindo">
                <h1 class="slogan">Bem vindo(a) ao Docks</h1>
                <p class="slogan">Aqui é o lugar para suas histórias</p>
            </div>
            <fieldset class="form-fieldset">
                <input type="text" name="idEmail" class="nome" placeholder="E-mail">
            </fieldset>
            <fieldset class="form-fieldset">
                <input type="password" name="senha" class="e-mail" placeholder="Insira sua senha">
            </fieldset>
            <div class="btn-continuar">
                <input type="submit" name="submit" class="continuar" value="Continuar" class="continuar">
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
            <p class="membro-cadastro2">Ainda não é um membro? Criar uma conta</p>
        </div>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>