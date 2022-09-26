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
    <button class="criar_livro" type="submit" id="myBtn"> + Criar novo Livro</button>
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
              <h4 class="container_nome"> <?php echo "<a href='../inicial.php?id=" . $values['nomeLivro'] . "'>" . $values['nomeLivro'] . "</a>" ?></h4>
              <a href="<?php echo "del_livro.php?id=" . $values['nomeLivro'] . ""?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                </svg></a>
              <a href="<?php echo "alt_livro.php?id=" . $values['nomeLivro'] . ""?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg></a>
            </div>

      <?php

          }
        }
      }
      ?>

    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

<?php
include "../footer.php"
?>