
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/pagina_inicial.css">
    <link rel="stylesheet" href="assets/css/modal_login.css">
</head>
<body>
    <div class="container-site">
    <?php 
$titulo = "Página Inicial";
include "head1.php";
?>
    <div class="container-inicial">
    <h1 class="titulo-site">Docks</h1>
    <p class="paragrafo-site">Aqui é o lugar para as suas histórias</p>
</div>
<div class="container-btn">
<button class=" btn-inicial" data-bs-toggle="modal" data-bs-target="#modalcadastro"><a>CADASTRE-SE JÁ</a></button>
</div>
<div class="container-personagens">
<img class="docks_personagem" src="assets/images/docks_personagem.png" alt="">
<img class="pate_personagem" src="assets/images/pate_personagem.png" alt="">
</div>
</div>
<div class="modal fade" id="modalcadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" style="position: fixed;">
      <div class="modal-header2">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <?php
       include "login1_0.php";
       ?>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>