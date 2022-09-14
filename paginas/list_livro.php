<?php
include "../include/MySql.php";
session_start();
$nomeLivro =

  $sql = $pdo->prepare('SELECT * FROM livros WHERE idEmail=?');
if ($sql->execute(array($_SESSION['idEmail']))) {
  $info = $sql->fetchAll(PDO::FETCH_ASSOC);
  if (count($info) > 0) {
    foreach ($info as $key => $values) {
      $_SESSION['nomeLivro'] = $nomeLivro;
      $nomeLivro = "";
    }
    //header('location:paginas/list_usuario.php');
  }
  echo "<table border='1'>";
  echo "<tr>";
  echo "  <th>Nome do Livro</th>";
  echo "  <th>Usuário</th>";
  echo "  <th>Imagem</th>";
  echo "  <th>Selecionar</th>";
  echo "  <th>Excluir</th>";
  echo "</tr>";
  foreach ($info as $key => $value) {
    echo "<tr>";
    echo "<td>" . $value['nomeLivro'] . "</td>";
    echo "<td>" . $value['idEmail'] . "</td>";
    echo '<td><img src="data:image/png;base64,' . base64_encode($value['capaLivro']) . '" />1</td>';
    echo "<td><center><a href='../inicial.php?id=" . $value['nomeLivro'] . "'>(+)</a></center></td>";
    echo "<td><center><a href='del_livro.php?id=" . $value['nomeLivro'] . "'>(-)</a></center></td>";
    echo "<td><center><a href='alt_livro.php?id=" . $value['nomeLivro'] . "'>(😥)</a></center></td>";
    echo "</tr>";
  }
  echo "</table>";
}
