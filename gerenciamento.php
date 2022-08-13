<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciamento de Conta</title>
    <link rel="stylesheet" href="assets/css/gerenciamento.css">
    <link rel="stylesheet" href="assets/css/input-gerenciamento.css">
</head>

<body>
    <h1>Gerenciamento de Conta</h1>
</body>

</html>

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
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/input-gerenciamento.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">

        Email: <br><input type="text" name="email">
        <span class="obrigatorio">*</span>
        <input type="submit" value="Alterar" name="submit">
        <br>
        Senha: <br><input type="password" name="senha">
        <span class="obrigatorio">*</span>
        <input type="submit" value="Alterar" name="submit">
        <br>
            <input type="reset" value="Desativar Conta" name="reset">
        <br>
        <input type="button" value="Salvar alterações" name="button">

        
    </form>
    <span></span>
</body>

</html>