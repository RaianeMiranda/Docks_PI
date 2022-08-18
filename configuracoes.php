<?php 
include "head.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="stylesheet" href="assets/css/configuracoes.css">
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Source Serif Pro' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    
</head>

<body>
    <div class="config">
        <h1 class="titulo-config">Configurações</h1>
        <div class="config2">
            <h2 class="tipografia">Tipografia</h2>
            <h2 class="acessibilidade">Acessibilidade</h2>
        </div>
    </div>
    <div class="container-tipografia-acessibilidade">
    <div class="container">
    <div class="botao-tipografia-container">
        <a href=""><button class="botao-tipografia1">Merriweather</button></a>
        <a href=""><button class="botao-tipografia2">Source serif pro</button></a>
</div>
        <div class="botao-tipografia-container2">
            <a href=""><button class="botao-tipografia3">Open Sans</button></a>
            <a href=""><button class="botao-tipografia4">Noto sans</button></a>
        </div>
    </div>
   <div class="container-acessibilidade">
   <div class="botao-acessibilidade-container">
    <a href=""><button class="botao-acessibilidade1">Tradutor de Libras</button></a>
    <a href=""><button class="botao-acessibilidade2">Desligar</button></a>
</div>
  <div class="botao-acessibilidade-container2">
    <a href=""><button class="botao-acessibilidade3">Alto Contraste</button></a>
    <a href=""><button class="botao-acessibilidade4">Ligar</button></a>
  </div>
  <div class="botao-acessibilidade-container3">
    <a href=""><button class="botao-acessibilidade5">Daltonismo<br>(Escala Cinza)</button></a>
    <a href=""><button class="botao-acessibilidade6">Desligar</button></a>
  </div>
</div>
</div>
</div>
<?php
include "gerenciamento.php"
?>
</body>

</html>