<?php
session_start();
include "../include/MySql.php";

    $sql = $pdo->prepare('SELECT * FROM snowflake');
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
            echo "<td>".$value['nome_snow']."</td>";
            echo "<td>".$value['descricao']."</td>";
            echo "<td><center><a href='altEtapa_adm.php?id=".$value['codSnowflake']."'>(+)</a></center></td>";
            echo "<td><center><a href='delEtapa_adm.php?id=".$value['codSnowflake']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<br>
<input type="button" value="Cadastrar" onclick="parent.location='../paginas/cadEtapa.php'">
