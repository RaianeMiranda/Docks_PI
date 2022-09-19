<?php
    include "include/MySql.php";

    $sql = $pdo->prepare('SELECT * FROM MUNDO');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>descrição</th>";
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";
        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['descricao']."</td>";

            echo "<td><center><a href='altMundo.php?id=".$value['codMundo']."'>(+)</a></center></td>";
            echo "<td><center><a href='delMundo.php?id=".$value['codMundo']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<br>
<input type="button" value="Cadastrar" onclick="parent.location='cadMundo.php'">