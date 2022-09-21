
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="assets/css/pagina_inicial.css">
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
<button class="btn-inicial"><a>CADASTRE-SE JÁ</a></button>
</div>
<div class="container-personagens">
<img class="docks_personagem" src="assets/images/docks_personagem.png" alt="">
<img class="pate_personagem" src="assets/images/pate_personagem.png" alt="">
</div>
</div>
<?php
include "footer.php";
?>


</body>
</html>