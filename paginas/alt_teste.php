<?php
include "../include/MySql.php";

$nome = "";
$idEmail = "";
$senha = "";

$nomeErro = "";
$emailErro = "";
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
            $senha = ''; //$value['senha];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) { //se isso for verdadeiro e isso prossiga
    if (empty($_POST['nome']))
        $nomeErro = "Nome é obrigatório";
    else
        $nome = $_POST['nome'];

    if (empty($_POST['email']))
        $emailErro = "Email é obrigatório";
    else
        $idEmail = $_POST['email'];

    if (empty($_POST['senha']))
        $senhaErro = "Senha é obrigatório";
    else
        $senha = $_POST['senha'];

    if ($idEmail && $nome && $senha) { //se o email e o nome e[...] não estiverem preenhidos ele não irá prosseguir e aparecera o erro do else
        // verificar se já existe o email
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE idEmail =?");
        if ($sql->execute(array($idEmail))) {
            if ($sql->rowCount() <= 0) {
                $sql = $pdo->prepare("UPDATE USUARIO SET nome=?, senha=? WHERE idEmail=?");
//Não pode alterar a chave primária, ela deve se manter a msm. Então precisa procurar o erro
                if ($sql->execute(array($nome, md5($senha), $idEmail))) {
                    $msgErro = "Dados alterados com sucesso!";
                    //header('location:listUsuario.php'); //acima de header não pode ter echo de forma alguma
                } else {
                    $msgErro = "Dados não cadastrados!";
                }
            } else {
                $msgErro = "Erro no comando UPDATE";
            }
        } else {
            $msgErro = "Dados não alterados!";
        }
    }
}


?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Alteração de Usuário</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Cadastro de Usuário</legend>
            Nome: <input type="text" name="nome" value="<?php echo $nome ?>">
            <span class="obrigatorio">*<?php echo $nomeErro ?></span>
            <br>
            Email: <input type="text" name="email" value="<?php echo $idEmail ?>">
            <span class="obrigatorio">*<?php echo $emailErro ?></span>
            <br>
            Senha: <input type="password" name="senha" value="<?php echo $senha ?>">
            <span class="obrigatorio">*<?php echo $senhaErro ?></span>
            <br>

            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>