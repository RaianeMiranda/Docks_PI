<?php
include "../include/MySql.php";
session_start();
echo "aqui:" . $_SESSION['nome'];
echo "aqui:" . $_SESSION['idEmail'];
echo "aqui:" . $_SESSION['nomeLivro'];
echo "aqui:" . $_SESSION['codLivro'];
$codLivro = "";
$nomeLivro = "";
$idEmail = "";
$capaLivro = "";

$nomeLivroErro = "";
$idEmailErro = "";
$senhaErro = "";
$msgErro = "";


if (isset($_GET['id'])) {
    $codLivro = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM LIVROS WHERE codLivro = ?");
    if ($sql->execute(array($codLivro))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $codLivro = $value['codLivro'];
            $nomeLivro = $value['nomeLivro'];
            $idEmail = $value['idEmail'];
            $capaLivro = $value['capaLivro'];
        }
    }
}



if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST['nomeLivro']))
        $nomeLivroErro = "nomeLivro é obrigatório!";
    else
        $nomeLivro = $_POST['nomeLivro'];

    if (empty($_POST['idEmail']))
        $idEmailErro = "idEmail é obrigatório!";
    else
        $idEmail = $_POST['idEmail'];

    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $capaLivro = file_get_contents($image);
        } else {
            $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
        }
    }

    if ($idEmail && $nomeLivro) {


        $sql = $pdo->prepare("UPDATE LIVROS SET codLivro=?, 
                                                             nomeLivro=?, 
                                                             idEmail=?, 
                                                             capaLivro=?
                                                       WHERE codLivro=?");

        if ($sql->execute(array($_SESSION['codLivro'], $nomeLivro, $_SESSION['idEmail'], $capaLivro, $_SESSION['codLivro']))) {
            $msgErro = "Dados alterados com sucesso!";
            //header('location:listLIVROS.php');
        } else {
            $msgErro = "Dados não cadastrados!";
        }
    } else {
        $msgErro = "Dados não alteardos!";
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
            <legend>Alteração de Livros</legend>

            nomeLivro: <input type="text" name="<?php echo $value['nomeLivro'] ?>" value="<?php echo $_SESSION['nomeLivro'] ?>">
            <span class="obrigatorio">*<?php echo $nomeLivroErro ?></span>
            <br>
            <input type="file" name="image">
            <br>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>