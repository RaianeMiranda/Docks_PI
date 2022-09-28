<?php
include "include/MySql.php";
include "include/functions.php";
session_start();
$_SESSION['idEmail']="";
$_SESSION['nome']="";

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

        <div class="container_inicial3">
            <div class="image_top">
                <img class="logo-img" src="assets/images/docks.png" alt="">
            </div>
            <div class="bem-vindo">
                <h1 class="slogan">Bem vindo(a) Administrador(a)</h1>
                <p class="slogan">Aqui é o lugar para suas histórias</p>
            </div>
            <fieldset class="form-fieldset">
                <input type="text" class="nome" name="idEmail" placeholder="E-mail">
            </fieldset>
            <fieldset class="form-fieldset">
                <input type="password" class="senha"  name="senha" placeholder="Insira sua senha">
            </fieldset>
            <div class="btn-continuar">
                <input type="submit" name="continuar" class="continuar" value="Continuar" class="continuar">
            </div>
            <br>
            <p class="membro-cadastro3">Problemas com o seu acesso? Procure ajuda capacitada!</p>
        </div>
    </form>
</body>

</html>
<span><?php echo $msgErro ?></span>
<!-- 
            <div class="login-meio">
            <label for="e-mail">E-mail</label>
            <input class="" type="text" name="idEmail" class="e-mail" placeholder="Digite seu E-mail">
            </div>
        -->