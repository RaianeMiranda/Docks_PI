<?php
    session_start();
    include "include/MySql.php";

    $msgErro = "";
    $codEtapas = "";

    if (isset($_GET['id'])){
        $codEtapas = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM ETAPAS WHERE codEtapas = ?");
        if ($sql->execute(array($codEtapas))){
            if ($sql->rowCount() > 0){
                $msgErro = "Etapa-Snowflake excluída com sucesso!";
                header('location:listEtapa.php');
            } else {
                $msgErro = "Etapa-Snowflake não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir Etapa-Snowflake!";
        }
    }
    echo " Mensagem de erro: $msgErro ";

?>