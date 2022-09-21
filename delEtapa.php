<?php
    include "include/MySql.php";

    $msgErro = "";
    $codSnowflake = "";

    if (isset($_GET['id'])){
        $codSnowflake = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM snowflake WHERE codSnowflake = ?");
        if ($sql->execute(array($codSnowflake))){
            if ($sql->rowCount() > 0){
                $msgErro = "etapa excluído com sucesso!";
                header('location:listEtapa.php');
            } else {
                $msgErro = "Código não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir usuário!";
        }
    }
    echo "Mensagem de erro: $msgErro";
?>