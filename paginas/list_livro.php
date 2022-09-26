<?php
include "../include/MySql.php";
session_start();
$nomeLivro = "";




// echo "<table border='1'>";
// echo "<tr>";
// echo "  <th>Nome do Livro</th>";
// echo "  <th>Usuário</th>";
// echo "  <th>Imagem</th>";
// echo "  <th>Selecionar</th>";
// echo "  <th>Excluir</th>";
// echo "</tr>";
// foreach ($info as $key => $value) {
//   echo "<tr>";
//   echo "<td>" . $value['nomeLivro'] . "</td>";
//   echo "<td>" . $value['idEmail'] . "</td>";
//   echo '<td><img style= "width:180px; height:240px;" src="data:image/png;base64,' . base64_encode($value['capaLivro']) . '" /></td>';
//   echo "<td><center><a href='../inicial.php?id=" . $value['nomeLivro'] . "'>(+)</a></center></td>";
//   echo "<td><center><a href='del_livro.php?id=" . $value['nomeLivro'] . "'>(-)</a></center></td>";
//   echo "<td><center><a href='alt_livro.php?id=" . $value['nomeLivro'] . "'>(😥)</a></center></td>";
//   echo "</tr>";
// }
// echo "</table>";

?>
<?php
include "../head.php";
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/biblioteca.css">

<body>
<main>
  <h1 class="titulo_biblioteca">Biblioteca</h1>
  <button class="criar_livro" type="submit" id="myBtn"><i class="fa-solid fa-plus"></i> Criar novo Livro</button>
  <div class="container">

    <?php
    $sql = $pdo->prepare('SELECT * FROM livros WHERE idEmail=?');
    if ($sql->execute(array($_SESSION['idEmail']))) {
      $info = $sql->fetchAll(PDO::FETCH_ASSOC);
      if (count($info) > 0) {
        foreach ($info as $key => $values) {

          $_SESSION['nomeLivro'] = $nomeLivro;
    ?>


          <div class="listagem">
            <div class="capa_livro">
              <?php echo '<img class= "capa_livro-img" src="data:image/png;base64,' . base64_encode($values['capaLivro']) . '" />' ?>
            </div>
            <h4 class="container"> <a class="nome_livro" href="metodo_criacao_de_personagem.php"><?php echo  $values['nomeLivro'] ?></a></h4>
          </div>

    <?php

        }
      }
    }
    ?>

  </div>
  </main>
</body>

<?php 
include "../footer.php"
?>