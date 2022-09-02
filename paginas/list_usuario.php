<?php
include "../include/MySql.php";
$idEmail =

$sql = $pdo->prepare('SELECT * FROM usuario');
if ($sql->execute()) {
  $info = $sql->fetchAll(PDO::FETCH_ASSOC);
  if (count($info) > 0) {
    foreach ($info as $key => $values) {
      $_SESSION['idEmail'] =$idEmail;
      $idEmail = "";
    }
    //header('location:paginas/list_usuario.php');
  }
  echo "<table border='1'>";
  echo "<tr>";
  echo "  <th>Email</th>";
  echo "  <th>Nome</th>";
  echo "  <th>Senha</th>";
  echo "  <th>Selecionar</th>";
  echo "  <th>Excluir</th>";
  echo "</tr>";
  foreach ($info as $key => $value) {
    echo "<tr>";
    echo "<td>" . $value['idEmail'] . "</td>";
    echo "<td>" . $value['nome'] . "</td>";
    echo "<td>" . $value['senha'] . "</td>";
    echo "<td><center><a href='alt_usuario.php? id=".$value['idEmail'] . "'>(+)</a></center></td>";
    echo "<td><center><a href='del_usuario.php? id=".$value['idEmail'] . "'>(-)</a></center></td>";
    echo "</tr>";
  }
  echo "</table>";
}
?>
<input type="button" value="Cadastrar" onclick="parent.location='cad_usuario.php'"> <!--Onclick= ao clicar redirecione para cadusuario-->
<h3><a href="../inicial.php">Principal</a></h3>