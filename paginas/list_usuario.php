<?php
include "include/MySql.php";

$sql = $pdo->prepare('SELECT * FROM usuario');
if ($sql->execute()) {
  $info = $sql->fetchAll(PDO::FETCH_ASSOC);

  echo "<table border='1'>";
  echo "<tr>";
  echo "  <th>Nome</th>";
  echo "  <th>idEmail</th>";
  echo "  <th>Senha</th>";
  echo "  <th>Alterar</th>";
  echo "  <th>Excluir</th>";
  echo "</tr>";
  foreach ($info as $key => $value) {
    echo "<tr>";
    echo "<td>" . $value['nome'] . "</td>";
    echo "<td>" . $value['idEmail'] . "</td>";
    echo "<td>" . $value['senha'] . "</td>";
    echo "<td><center><a href='altUsuario.php?id=" . $value['idEmail'] . "'>(+)</a></center></td>";
    echo "<td><center><a href='delUsuario.php?id=" . $value['idEmail'] . "'>(-)</a></center></td>";
    echo "</tr>";
  }
  echo "</table>";
}
?>
<input type="button" value="Cadastrar" onclick="parent.location='paginas/cadUsuario.php'">
<!--Onclick= ao clicar redirecione para cadusuario-->
<h3><a href="principal.php">Principal</a></h3>