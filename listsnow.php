<?php
session_start();
include "include/mysql.php";

    $sql = $pdo->prepare('SELECT * FROM etapas');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        //echo "  <th>nome fase</th>";
        echo "  <th>descrição</th>";
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";
        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['descricao']."</td>";
            echo "<td><center><a href='altUsuario.php?id=".$value['codSnowflake']."'>(+)</a></center></td>";
            echo "<td><center><a href='delUsuario.php?id=".$value['codSnowflake']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<input type="button" value="Cadastrar" onclick="parent.location='admsnow.php'">
funcionando