<?php

    session_start();
    include "include/MySql.php";

    $msgErro = "";
    $codMundo = "";

    if (isset($_GET['id'])){
        $codMundo = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM MUNDO WHERE codMundo = ?");
        if ($sql->execute(array($codMundo))){
            if ($sql->rowCount() > 0){
                $msgErro = "Descrição-Mundo excluído com sucesso!";
                header('location:listMundo.php');
            } else {
                $msgErro = "Descrição-Mundo não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir Descrição-Mundo!";
        }
    }
    echo "Mensagem de erro: $msgErro";
?>