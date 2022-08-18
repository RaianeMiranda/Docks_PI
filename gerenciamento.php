<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciamento de Conta</title>
    <link rel="stylesheet" href="assets/css/gerenciamento.css">
    <link rel="stylesheet" href="assets/css/input-gerenciamento.css">
    <div class="gerenciamento-titulo">
        <h1>Gerenciamento da conta</h1>
    </div>
</head>


<?php /*00
$codigo = "";
$email = "";
$senha = "";

$emailErro = "";
$senhaErro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST['email']))
        $emailErro = "Email é obrigatório!";
    else
        $email = $_POST['email'];
    if (empty($_POST['senha']))
        $senhaErro = "Senha é obrigatório!";
    else
        $senha = $_POST['senha'];
}
if ($email && $senha) {
    //Verificar se ja existe o email
    $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE email = ? AND codigo <> ?");
    if ($sql->execute(array($email, $codigo))) {
        if ($sql->rowCount() <= 0) {
            $sql = $pdo->prepare("UPDATE USUARIO SET codigo=?, 
                                                     email=?, 
                                                     senha=?,
                                               WHERE codigo=?");
            if ($sql->execute(array($codigo, $email, md5($senha), $codigo))) {
                header('location:listUsuario.php');
                $msgErro = "Dados alterados com sucesso!";
            } else {
                $msgErro = "Dados não cadastrados!";
            }
        } else {
            $msgErro = "Email de usuário já cadastrado!!";
        }
    } else {
        $msgErro = "Dados não alteardos!";
    }
}
*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <link rel="stylesheet" href="../css/input-gerenciamento.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="email-gerenciamento">
            <p>Email: </p><input type="text" name="email">
            <span class="obrigatorio">*</span>
            <input type="submit" value="Alterar" name="submit">
            <br>
        </div>
        <div class="senha-gerenciamento">
            <p>Senha: </p><input type="password" name="senha">
            <span class="obrigatorio">*</span>
            <input type="submit" value="Alterar" name="submit">
            <br>
        </div>
        <div class="botao-desativar-conta">
            <input type="reset" value="Desativar Conta" name="reset">
            <br>
        </div>
        <div class="botao-salvar-alteracoes">
            <input type="button" value="Salvar alterações" name="button">
        </div>
    </form>
    <span></span>
</body>

</html>