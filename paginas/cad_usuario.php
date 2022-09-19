<?php
include "../include/MySql.php";

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
                    $msgErro = "Dados cadastrados com sucesso!";
                    $nome = "";
                    $idEmail = "";
                    $senha = ""; //isso serve para zerar as variáveis e não manter os dados no formulário
                    header('location:../login.php'); //acima de header não pode ter echo de forma alguma
                } else {
                    $msgErro = "Dados não cadastrados!";
                }
            } else {
                $msgErro = "Email de usuário já cadastrado";
            }
        } else {
            $msgErro = "Erro no comando SELECT";
        }
    } else {
        $msgErro = "Dados não cadastrados!";
    }
}


?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
</head>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="login-form">
        <div class="todoLogin">
            <div class="login_cima">
                <div class="container">
                    <div class="flex2">
                        <img class="logo" src="../assets/images/logo.png" alt="logo do site, sendo um círculo com nosso mascote docks, um pato dentro desse círculo.">
                    </div>
                    <div class="flex3">
                        <span class="close">&times;</span>
                    </div>
                </div>

                <h1 class="slogan">Bem vindo(a) ao Docks</h1>
                <p class="slogan">Aqui é o lugar para suas histórias</p>
            </div>

            <div class="login-meio">
                <fieldset>
                    <legend for="nome">Digite seu E-mail</legend>
                    <input class="norm-login" type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $nome ?>">
                </fieldset>
                <fieldset>
                    <legend for="idEmail">Digite seu E-mail</legend>
                    <input class="norm-login" type="text" name="idEmail" id="idEmail" placeholder="E-mail" value="<?php echo $idEmail ?>">
                </fieldset>

                <fieldset>
                    <legend for="Senha">Digite sua Senha</legend>
                    <input class="norm-login" type="password" name="senha" id="Senha" placeholder="Senha" value="<?php echo $senha ?>">
                </fieldset>
                <span><?php echo $msgErro ?></span>
                <input type="submit" name="continuar" id="continuar" value="Continuar" class="continuar"></input>

                <p class="ou">OU</p>
            </div>

            <div class="login-baixo">


                <p>Ainda não é um membro?</p>
                <p><a href="paginas/cad_usuario.php"><button class="membro">Cadastre-se</button></a></p>

            </div>
        </div>
    </div>
</form>

<!-- 
            <div class="login-meio">
            <label for="e-mail">E-mail</label>
            <input class="" type="text" name="idEmail" id="e-mail" placeholder="Digite seu E-mail">
            </div>
        -->