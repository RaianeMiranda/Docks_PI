<?php
$nome_cap ="Nome do capítulo";
$codCapitulo="Capítulo";
echo "aqui:" . $_SESSION['nomeLivro'];
echo "aqui:" . $_SESSION['nome_cap'];
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['salvar_cap'])) {

    if (empty($_POST['nome_cap']))
        $nome_capErro = "Nome é obrigatório!";
    else
        $nome_cap = $_POST['nome_cap'];

    if ($nome_cap) {
        //Verificar se ja existe o idEmail
        $sql = $pdo->prepare("SELECT * FROM CAPITULO WHERE nome_cap = ?");
        if ($sql->execute(array($nome_cap))) {
            if ($sql->rowCount() <= 0) {
                $sql = $pdo->prepare("INSERT INTO CAPITULO (codCapitulo, nome_cap, nomeLivro)
                                                VALUES (NULL, ?, ?)");
                if ($sql->execute(array($codCapitulo, $nome_cap, $_SESSION['nomeLivro']))) {
                    $msgErro = "Capítulo cadastrados com sucesso!";
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
<form action="POST">
    <h1>Capítulos</h1>
    <input type="submit" value="Livro completo" name="livro_completo">
    <fieldset>
        <input type="text" value="<?php echo $codCapitulo ?>" name="num_cap">
        <input type="text" value="<?php echo $nome_cap ?>" name="nome_cap">
    </fieldset>
    <input type="submit" value="+ Adicionar novo capítulo" name="add_cap">
    <input type="submit" value="Salvar" name="salvar_cap">
</form>
<span><?php echo $msgErro ?></span>