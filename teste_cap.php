<?php

$nome_cap = "Nome do capítulo";
$codCapitulo = "";
$nome_capErro = "";
$msgErro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['salvar_cap'])) {

            if (empty($_POST['nome_cap']))
                $nome_capErro = "Nome é obrigatório!";
            else
                $nome_cap = $_POST['nome_cap'];

            if ($name_cap) {
                //Verificar se ja existe o email
                $sql = $pdo->prepare("SELECT * FROM CAPITULO WHERE nome_cap = ?");
                if ($sql->execute(array($nome_cap))) {
                    if ($sql->rowCount() <= 0) {
                        $sql = $pdo->prepare("INSERT INTO CAPITULO (codCapitulo, nome_cap, nomeLivro )
                                                VALUES (null, ?, ?)");
                        if ($sql->execute(array($codCapitulo, $nome_cap, $_SESSION['nomeLivro']))) {
                            $msgErro = "Dados cadastrados com sucesso!";
                            $nome_cap = "";
                           // header('location:login.php');
                        } else {
                            $msgErro = "Dados não cadastrados!";
                        }
                    } else {
                        $msgErro = "Email de usuário já cadastrado!!";
                    }
                } else {
                    $msgErro = "Erro no comando SELECT!";
                }
            } else {
                $msgErro = "Dados não cadastrados!";
            }
        } 

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Cadastro de Usuário</legend>

            <input type="text" name="nome" value="<?php echo $codCapitulo ?>">
            <span class="obrigatorio">*<?php echo $nome_capErro ?></span>
            <br>
            <input type="text" name="email" value="<?php echo $nome_cap ?>">
            <br>

            <input type="submit" value="Salvar" name="salvar_cap">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>