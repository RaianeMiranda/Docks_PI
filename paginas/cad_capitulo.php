<?php
$nome_cap = "";
$nota_cap = "";
$codCapitulo = "";
$nome_capErro = "";
$msgErro = "";
echo "aqui:" . $_SESSION['idEmail'];
echo "<br>";
echo "aqui:" . $_SESSION['nomeLivro'];
echo "<br>";
//CHAMANDO CÓDIGO LIVRO PELA SESSÃO DO NOMELIVRO
$sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
if ($sql->execute(array($_SESSION['nomeLivro']))) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
            $_SESSION['codLivro'] = $value['codLivro'];
        }
    } else {
        $_SESSION['codLivro'] = 0;
    }
}
echo "aqui:" . $_SESSION['codLivro'];

//CADASTRO DE CAPÍTULOS
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['enviarcap'])) {

    if (empty($_POST['nome_cap']))
        $nome_capErro = "Nome é obrigatório!";
    else
        $nome_cap = $_POST['nome_cap'];

    if ($nome_cap) {
        //Verificar se ja existe o idEmail
        $sql = $pdo->prepare("SELECT * FROM CAPITULO WHERE nome_cap = ?");
        if ($sql->execute(array($nome_cap))) {
            if ($sql->rowCount() <= 0) {
                $sql = $pdo->prepare("INSERT INTO CAPITULO (codCapitulo, codLivro, nome_cap, nota_cap)
                                            VALUES (NULL, ?, ?, NULL)");
                if ($sql->execute(array($_SESSION['codLivro'], $nome_cap))) {
                    $msgErro = "Dados cadastrados com sucesso!";
                    $_SESSION['nome_cap'] = $nome_cap;
                    $nome_cap = "";
                    //header('location:../inicial.php');
                } else {
                    $msgErro = "Dados não cadastrados!";
                }
            }
        } else {
            $msgErro = "Erro no comando SELECT!";
        }
    } else {
        $msgErro = "Dados não cadastrados!";
    }
}
?>

<?php
$sql = $pdo->prepare('SELECT * FROM capitulo');
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
            $_SESSION['nome_cap'] = $nome_cap;
            $nome_cap = "";
        }
        //header('location:paginas/list_usuario.php');
    }
    echo "<table border='1'>";
    echo "<tr>";
    echo "  <th>Nome do Capítulo</th>";
    echo "  <th>nºcapítulo</th>";
    echo " <th> Livro </>";
    echo "  <th>Selecionar</th>";
    echo "  <th>Excluir</th>";
    echo "</tr>";
    foreach ($info as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['nome_cap'] . "</td>";
        echo "<td>" . $value['codCapitulo'] . "</td>";
        echo "<td>" . $value['codLivro'] . "</td>";
        echo "<td><center><a href='paginas/.php?id=" . $value['codCapitulo'] . "'>(+)</a></center></td>";
        echo "<td><center><a href='paginas/del_capitulo.php?id=" . $value['codCapitulo'] . "'>(-)</a></center></td>";
        echo "</tr>";
    }
    echo "</table>";
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
            <legend>Cadastro de Capítulos</legend>

            Nome: <input type="text" name="nome_cap" value="<?php echo $nome_cap ?>">
            <span class="obrigatorio">*<?php echo $nome_capErro ?></span>
            <br>
            <input type="submit" value="Salvar" name="enviarcap">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>

</body>

</html>