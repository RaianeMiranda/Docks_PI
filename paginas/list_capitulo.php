<?php
$nome_cap="";

$sql = $pdo->prepare('SELECT * FROM capitulo');
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
            $_SESSION['nome_cap'] = $nome_cap;
            $nome_cap = "";
        }
        //header('location:paginas/list_usuario.php');
    }
    echo "<table border='1'>";
    echo "<tr>";
    echo "  <th>Nome do Capítulo</th>";
    echo "  <th>nºcapítulo</th>";
    echo " <th> Livro </>";
    echo "  <th>Selecionar</th>";
    echo "  <th>Excluir</th>";
    echo "</tr>";
    foreach ($info as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['nome_cap'] . "</td>";
        echo "<td>" . $value['codCapitulo'] . "</td>";
        echo "<td>" . $value['codLivro'] . "</td>";
        echo "<td><center><a href='paginas/.php?id=" . $value['codCapitulo'] . "'>(+)</a></center></td>";
        echo "<td><center><a href='paginas/del_capitulo.php?id=" . $value['codCapitulo'] . "'>(-)</a></center></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>