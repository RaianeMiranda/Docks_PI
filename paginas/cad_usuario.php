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

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) { //se isso for verdadeiro e isso prossiga
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

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Cadastro de Usuário</legend>
            Nome: <input type="text" name="nome" value="<?php echo $nome ?>">
            <span class="obrigatorio">*<?php echo $nomeErro ?></span>
            <br>
            Email: <input type="text" name="idEmail" value="<?php echo $idEmail ?>">
            <span class="obrigatorio">*<?php echo $idEmailErro ?></span>
            <br>
            Senha: <input type="password" name="senha" value="<?php echo $senha ?>">
            <span class="obrigatorio">*<?php echo $senhaErro ?></span>
            <br>
            <input type="checkbox" name="administrador"> Administrador
            <br>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>