<?php
include "include/mysql.php";
$codCapitulo = "";
$codLivro = "";
$nome_cap_cap = "";
$descricao = "";

$descricaoErro = "";
$nome_capErro = "";
$descricaoErro = "";
$msgErro = "";

if (isset($_GET['id'])) {
    $codCapitulo = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM CAPITULO WHERE codCapitulo = ?");
    if ($sql->execute(array($codCapitulo))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $nome_cap = $value['nome_cap'];
            $codCapitulo = $value['codCapitulo'];
            $descricao = $value['descricao'];
            $codLivro = $value['codLivro'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) { //se isso for verdadeiro e isso prossiga
    if (empty($_POST['nome_cap']))
        $nome_capErro = "nome_cap é obrigatório";
    else
        $nome_cap = $_POST['nome_cap'];


    if ($nome_cap) { //se o codCapitulo e o nome_cap e[...] não estiverem preenhidos ele não irá prosseguir e aparecera o erro do else
        // verificar se já existe o codCapitulo

        $sql = $pdo->prepare("UPDATE CAPITULO SET nome_cap = ?, codCapitulo = ?, descricao = ? WHERE codCapitulo  = ?");

        if ($sql->execute(array($nome_cap, $codCapitulo, md5($descricao), $codCapitulo))) {
            $_SESSION['codCapitulo'] = $codCapitulo;
            $msgErro = "Dados alterados com sucesso!";
            //header('location:inicial.php'); //acima de header não pode ter echo de forma alguma
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
        <fieldset>
            <legend>Cadastro de Usuário</legend>
            Código do Livro: <input type="text" name="codCapitulo" value="<?php echo $codCapitulo ?>" readonly>
            <br>
            nome_cap: <input type="text" name="nome_cap" value="<?php echo $nome_cap ?>">
            <span class="obrigatorio">*<?php echo $nome_capErro ?></span>

            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>