<?php
include "../include/MySql.php";
session_start();
$codImagem = "";
$imagem = "";


$sql = $pdo->prepare('SELECT * FROM IMAGEM');
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
            $_SESSION['codImagem'] = $codImagem;
            $codImagem = "";
            $_SESSION['imagem'] = $imagem;
            $imagem = "";
        }
        //header('location:paginas/list_usuario.php');
    }
    echo "<div class='imagens'>";
    echo "<div class='flex_imagens'";
    echo "<div>";
    echo "  <p>Imagem</p>";
    echo "<div>";
    echo "  <p>Selecionar</p>";
    echo "</tr>"; ?>
    <link rel="stylesheet" href="../assets/css/criar_livros.css">
    <div class="gallery-container">
        <?php
        foreach ($info as $key => $value) {
            echo '<a class="gallery-itens"><img src="data:image/png;base64,' . base64_encode($value['imagem']) . '" /></a>'. "<a href='../inicial.php?id=" . $value['codImagem'] . "'>(+)</a>";
        }
        ?>
    </div>
<?php
}

/*
include "../include/MySql.php";
session_start();
$codImagem ="";
$imagem ="";


$sql = $pdo->prepare('SELECT * FROM IMAGEM');
if ($sql->execute()) {
  $info = $sql->fetchAll(PDO::FETCH_ASSOC);
  if (count($info) > 0) {
    foreach ($info as $key => $values) {
      $_SESSION['codImagem'] =$codImagem;
      $codImagem = "";
      $_SESSION['imagem'] =$imagem;
      $imagem = "";
    }
    //header('location:paginas/list_usuario.php');
  }
  echo "<table border='1'>";
  echo "<tr>";
  echo "  <th>Usuário</th>";
  echo "  <th>Imagem</th>";
  echo "  <th>Selecionar</th>";
  echo "</tr>";
  foreach ($info as $key => $value) {
    echo "<tr>";
    echo "<td>" . $value['codImagem'] . "</td>";
    echo '<td><img src="data:image/png;base64,' . base64_encode($value['imagem']) . '" />1</td>';
    echo "<td><center><a href='../inicial.php?id=" . $value['codImagem'] . "'>(+)</a></center></td>";
    echo "</tr>";
  }
  echo "</table>";
}*/ ?>