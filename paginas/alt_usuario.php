<?php
include "../include/mysql.php";
//NÃO ESTÁ FUNCIONANDO 😥
$nome = "";
$idEmail = "";
$senha = "";

$nomeErro = "";
$idEmailErro = "";
$senhaErro = "";
$msgErro = "";

    if (isset($_GET['id'])){
        $idEmail = $_GET['id'];
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE idEmail = ?");
        if ($sql->execute(array($idEmail))){
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($info as $key => $value){
                $nome = $value['nome'];
                $idEmail = $value['idEmail'];
                $senha = $value['senha'];
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
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE idEmail =?");
        if ($sql->execute(array($idEmail))) {
            if ($sql->rowCount() <= 0) {
                $sql = $pdo->prepare("UPDATE USUARIO SET nome = ?, idEmail = ?, senha = ? WHERE idEmail = ?");

                if ($sql->execute(array($nome, $idEmail, md5($senha), $idEmail))) {
                    $_SESSION['idEmail']= $idEmail;
                    $msgErro = "Dados alterados com sucesso!";
                   header('location:list_usuario.php'); //acima de header não pode ter echo de forma alguma
                } else {
                    $msgErro = "Dados não cadastrados!";
                }
            } else {
                $msgErro = "idEmail de usuário já cadastrado";
            }
        } else {
            $msgErro = "Erro no comando UPDATE";
        }
    } else {
        $msgErro = "Dados não alterados!";
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

            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>