<?php
$nome_cap = "";


$sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
if ($sql->execute(array($_SESSION['nomeLivro']))) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
            $_SESSION['codLivro'] = $values['codLivro'];
        }
    } else {
        $_SESSION['codLivro'] = 0;
    }
}

echo "aqui:" . $_SESSION['codLivro'];
$sql = $pdo->prepare('SELECT * FROM capitulo WHERE codLivro=?');
if ($sql->execute(array($_SESSION['codLivro']))) {
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
        echo "<td><center><a href='alt_capitulo.php?id=" . $value['codCapitulo'] . "'>(+)</a></center></td>";
        echo "<td><center><a href='del_capitulo.php?id=" . $value['codCapitulo'] . "'>(-)</a></center></td>";
        echo "<td><center><a href='escrever_cap.php?id=" . $value['codCapitulo'] . "'>CAD</a></center></td>";
        echo "</tr>";
    }
    echo "</table>";
}
