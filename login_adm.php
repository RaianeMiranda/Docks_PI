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
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE idEmail=? AND senha=? AND administrador=1"); //idEmail e a senha são validados com o banco de dados
        if ($sql->execute(array($idEmail, MD5($senha)))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (count($info) > 0) {
                foreach ($info as $key => $values) {
                    $_SESSION['nome'] = $values['nome'];
                    $_SESSION['idEmail'] = $values['idEmail'];
                    $_SESSION['administrador'] = '1';
                }
                header('location:list_usuario.php');
            } else {
                $msgErro = "Usuário não cadastrado!";
            }
        } else {
            $msgErro = "Usuário não cadastrado!";
        }
    }
}


?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="login-form">
        <div class="todoLogin">
            <div class="login_cima">
                <div class="container">
                    <div class="flex2">
                        <img class="logo" src="assets/images/logo.png" alt="logo do site, sendo um círculo com nosso mascote docks, um pato dentro desse círculo.">
                    </div>
                    <div class="flex3">
                        <span class="close">&times;</span>
                    </div>
                </div>

                <h1 class="slogan">Bem vindo(a) administrador(a)</h1>
                <p class="slogan">Senti a sua falta!!!</p>
            </div>

            <div class="login-meio">
                <fieldset>
                    <legend for="idEmail">Digite seu E-mail</legend>
                    <input class="norm-login" type="text" name="idEmail" id="idEmail" placeholder="E-mail">
                </fieldset>

                <fieldset>
                    <legend for="Senha">Digite sua Senha</legend>
                    <input class="norm-login" type="password" name="senha" id="Senha" placeholder="Senha">
                </fieldset>

                <input type="submit" name="continuar" id="continuar" value="Continuar" class="continuar"></input>

                <p class="ou">OU</p>
            </div>

            <div class="login-baixo">

                <fieldset>
                    <div class="flex">
                        <img class="icon-login" src="assets/images/facebook.png" alt="Faça seu login com o Facebook">
                        <a href="#"><button class="login-with">Continue com o Facebook </button></a>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="flex">

                        <img class="icon-login" src="assets/images/google.png" alt="Faça seu login com o Facebook">
                        <a href="#"><button class="login-with">Continue com o Google </button></a>
                    </div>
                </fieldset>
                <p>Ainda não é um membro?</p>
                <p><a href="cad_usuario.php"><button class="membro">Cadastre-se</button></a></p>

            </div>
        </div>
    </div>
</form>
<span><?php echo $msgErro ?></span>
<!-- 
            <div class="login-meio">
            <label for="e-mail">E-mail</label>
            <input class="" type="text" name="idEmail" id="e-mail" placeholder="Digite seu E-mail">
            </div>
        -->