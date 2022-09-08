<?php
include "../include/mysql.php";

$msgErro = "";
$codCapitulo = "";

if(isset($_GET['id'])){
    $codCapitulo = $_GET['id'];

    $sql = $pdo->prepare("DELETE FROM CAPITULO WHERE codCapitulo = ?");
    if ($sql->execute(array($codCapitulo))){
        if ($sql->rowCount()>0){
            $msgErro = "Capítulo excluido com sucesso!";
           // header('location:listUsuario.php');
        }else {
            $msgErro = "Código não localizado!";
        } 
    } else {
        $msgErro = "Erro ao excluir usuário!";
    }

}
echo "Mensagem de erro: $msgErro";

?>
