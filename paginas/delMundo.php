<?php
include "include/MySql.php";

$msgErro = "";
$codMundo = "";

if(isset($_GET['id'])){
    $codMundo = $_GET['id'];

    $sql = $pdo->prepare("DELETE FROM MUNDO WHERE codMundo = ?");
    if ($sql->execute(array($codMundo))){
        if ($sql->rowCount()>0){
            $msgErro = "descricao-mundo excluido com sucesso!";
            header('location:listMundo.php');
        }else {
            $msgErro = "Código não localizado!";
        } 
    } else {
        $msgErro = "Erro ao excluir usuário!";
    }

}
echo "Mensagem de erro: $msgErro";

?>