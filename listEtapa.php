<?php
session_start();
include "include/mysql.php";

    $sql = $pdo->prepare('SELECT * FROM ETAPAS');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>nome da etapa </th>";
        echo "  <th>descrição</th>";
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";
        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['nome_etapas']."</td>";
            echo "<td>".$value['descricao']."</td>";
            echo "<td><center><a href='altEtapa.php?id=".$value['codEtapas']."'>(+)</a></center></td>";
            echo "<td><center><a href='delEtapa.php?id=".$value['codEtapas']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<br>
<input type="button" value="Cadastrar" onclick="parent.location='cadEtapa.php'">
