<?php
    include "include/MySql.php";

    $msgErro = "";
    $codEtapas = "";

    if (isset($_GET['id'])){
        $codEtapas = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM ETAPAS WHERE codEtapas = ?");
        if ($sql->execute(array($codEtapas))){
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