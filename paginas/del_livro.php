<?php
include "../include/mysql.php";

$msgErro = "";
$nomeLivro = "";

if(isset($_GET['id'])){
    $nomeLivro = $_GET['id'];

    $sql = $pdo->prepare("DELETE FROM LIVROS WHERE nomeLivro = ?");
    if ($sql->execute(array($nomeLivro))){
        if ($sql->rowCount()>0){
            $msgErro = "Livro excluido com sucesso!";
         header('location:list_livro.php');
        }else {
            $msgErro = "Código não localizado!";
        } 
    } else {
        $msgErro = "Erro ao excluir usuário!";
    }

}
echo "Mensagem de erro: $msgErro";

?>
