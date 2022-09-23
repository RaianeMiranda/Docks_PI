<?php
session_start();
include "../include/mysql.php";

    $sql = $pdo->prepare('SELECT * FROM PERSONAGENS');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>nome do personagem</th>";
        echo "  <th>descrição</th>";
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir</th>";
        echo "</tr>";
        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['nome_persona']."</td>";
            echo "<td>".$value['descricao']."</td>";
            echo "<td><center><a href='personagem.php?id=".$value['codPersonagens']."'>(+)</a></center></td>";
            echo "<td><center><a href='delPersonagem.php?id=".$value['codPersonagens']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<br>
<input type="button" value="Cadastrar" onclick="parent.location='../paginas/cadPersonagem.php'">
