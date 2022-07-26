<?php

$nome = "";
$idEmail = "";
$senha = "";

$nomeErro = "";
$idEmailErro = "";
$senhaErro = "";
$msgErro = "";



if (isset($_GET['id'])) {
    $idEmail = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE idEmail = ?");
    if ($sql->execute(array($idEmail))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $nome = $value['nome'];
            $idEmail = $value['idEmail'];
            $senha = ""; //$value['senha'];
        }
    }
}

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

    if ($idEmail && $nome && $senha) { //se o idEmail e o nome e[...] não estiverem preenhidos ele não irá prosseguir e aparecera o erro do else
        // verificar se já existe o idEmail

        $sql = $pdo->prepare("UPDATE USUARIO SET nome = ?, idEmail = ?, senha = ? WHERE idEmail  = ?");

        if ($sql->execute(array($nome, $idEmail, md5($senha), $idEmail))) {
            $_SESSION['idEmail'] = $idEmail;
            $msgErro = "Dados alterados com sucesso!";
          //  header('location:list_usuario.php'); //acima de header não pode ter echo de forma alguma
        } else {
            $msgErro = "Dados não salvados!";
        }
    } else {
        $msgErro = "Dados não alterados!";
    }
}


?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <form action="" method="POST">
        


<body>
    <div class="alt-container">
        <div class="container-alteracao">
            <div class="alt-titulo">
                <h1>Alterações da conta</h1>
                <br>
            </div>
            <form action="" method="post"></form>
            <p class="alt-1"><b>Altere suas Informações</b></p><input type="text" name="idEmail" value="<?php echo $idEmail ?>" placeholder=" Seu E-mail Atual" readonly>
            <br>
            <input type="text" name="nome" placeholder="Altere Nome" value="<?php echo $nome ?>">
            <span class="obrigatorio">*<?php echo $nomeErro ?></span>
            <br>
            <p class="alt-2"><b>Altere sua senha</b></p><input type="password" placeholder=" Sua senha atual">
            <br>
            <input type="password" name="senha" placeholder=" Sua nova senha" value="<?php echo $senha ?>">
            <span class="obrigatorio">*<?php echo $senhaErro ?></span>
            <br>
            <form>
               <input type="submit" class="button" name="submit">
            </form>
            <span><?php echo $msgErro ?></span>
        </div>
    </div>


    </form>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterações da conta</title>
    <?php
    $titulo = "Alterações da conta";
    ?>
   

</body>

</html>