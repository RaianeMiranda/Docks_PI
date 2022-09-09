<?php
include "../include/mysql.php";
//NÃO FUNCIONA 😥 COMO ATUALIZAR IMAGE
$codLivro = "";
$nomeLivro = "";
$idEmail = "";
$capaLivro = "";

$nomeLivroErro = "";
$idEmailErro = "";
$capaLivroErro = "";
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
    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);
            //se isso for verdadeiro e isso prossiga
            if (empty($_POST['nomeLivro']))
                $nomeLivroErro = "NomeLivro é obrigatório";
            else
                $nomeLivro = $_POST['nomeLivro'];

            if (empty($_POST['capaLivro']))
                $capaLivroErro = "capaLivro é obrigatório";
            else
                $capaLivro = $_POST['capaLivro'];

            if ($idEmail && $nomeLivro && $capaLivro) { //se o idEmail e o nomeLivro e[...] não estiverem preenhidos ele não irá prosseguir e aparecera o erro do else
                // verificar se já existe o idEmail
                $sql = $pdo->prepare("SELECT * FROM LIVROS WHERE codLivro =?");
                        $sql = $pdo->prepare("UPDATE LIVROS SET codLivro = ?, nomeLivro = ?, capaLivro = ? WHERE codLivro = ?");

                        if ($sql->execute(array($codLivro, $nomeLivro, $capaLivro, $codLivro))) {
                            $msgErro = "Dados alterados com sucesso!";
                            //  header('location:listUsuario.php'); //acima de header não pode ter echo de forma alguma
                            $_SESSION['nomeLivro'] = $nomeLivro;
                        } else {
                            $msgErro = "Dados não cadastrados!";
                        }
                    } else {
                        $msgErro = "idEmail de usuário já cadastrado";
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
    <title>Cadastro de Usuário</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Cadastro de Usuário</legend>
            NomeLivro: <input type="text" name="nomeLivro" value="<?php echo $nomeLivro ?>">
            <span class="obrigatorio">*<?php echo $nomeLivroErro ?></span>
            <br>
            capaLivro:<input type="file" name="image">
            <br>

            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>