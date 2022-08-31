<?php
include "../include/MySql.php";
$nomeLivro =

$sql = $pdo->prepare('SELECT * FROM livros');
if ($sql->execute()) {
  $info = $sql->fetchAll(PDO::FETCH_ASSOC);
  if (count($info) > 0) {
    foreach ($info as $key => $values) {
      $_SESSION['nomeLivro'] =$nomeLivro;
      $nomeLivro = "";
    }
    //header('location:paginas/list_usuario.php');
  }
  echo "<table border='1'>";
  echo "<tr>";
  echo "  <th>Nome do Livro</th>";
  echo "  <th>Usuário</th>";
  echo "  <th>Selecionar</th>";
  echo "  <th>Excluir</th>";
  echo "</tr>";
  foreach ($info as $key => $value) {
    echo "<tr>";
    echo "<td>" . $value['nomeLivro'] . "</td>";
    echo "<td>" . $value['idEmail'] . "</td>";
    echo "<td><center><a href='../inicial.php?id=" . $value['nomeLivro'] . "'>(+)</a></center></td>";
    echo "<td><center><a href='del_usuario.php?id=" . $value['nomeLivro'] . "'>(-)</a></center></td>";
    echo "</tr>";
  }
  echo "</table>";
}
?>