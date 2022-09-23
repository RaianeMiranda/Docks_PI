<?php
include "../include/MySql.php";

$msgErro = "";
$codSnowflake = "";

if(isset($_GET['id'])){
    $codSnowflake = $_GET['id'];

    $sql = $pdo->prepare("DELETE FROM SNOWFLAKE WHERE codSnowflake = ?");
    if ($sql->execute(array($codSnowflake))){
        if ($sql->rowCount()>0){
            $msgErro = "Etapa excluida com sucesso!";
            header('location:listEtapas_adm.php');
        }else {
            $msgErro = "Código não localizado!";
        } 
    } else {
        $msgErro = "Erro ao excluir usuário!";
    }

}
echo "Mensagem de erro: $msgErro";

?>