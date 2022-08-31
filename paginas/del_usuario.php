<?php
include "../include/mysql.php";

$msgErro = "";
$idEmail = "";

if(isset($_GET['id'])){
    $idEmail = $_GET['id'];

    $sql = $pdo->prepare("DELETE FROM USUARIO WHERE idEmail = ?");
    if ($sql->execute(array($idEmail))){
        if ($sql->rowCount()>0){
            $msgErro = "Usuário excluido com sucesso!";
            header('location:listUsuario.php');
        }else {
            $msgErro = "Código não localizado!";
        } 
    } else {
        $msgErro = "Erro ao excluir usuário!";
    }

}
echo "Mensagem de erro: $msgErro";

?>