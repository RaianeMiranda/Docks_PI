<?php
    session_start();
    include "include/MySql.php";

    $msgErro = "";
    $codPersonagens = "";

    if (isset($_GET['id'])){
        $codPersonagens = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM PERSONAGENS WHERE codPersonagens = ?");
        if ($sql->execute(array($codPersonagens))){
            if ($sql->rowCount() > 0){
                $msgErro = "Descrição-Personagem excluída com sucesso!";
               header('location:inicial.php');
            } else {
                $msgErro = "Descrição-Personagem não localizado!";
            }
        } else {
            $msgErro = "Erro ao excluir Descrição-Personagem!";
        } 
    }
    echo " Mensagem de erro: $msgErro ";
    ?>