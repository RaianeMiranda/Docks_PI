<?php 
$titulo = "Configurações";
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
  <br>
    <div class="config">
        <h1 class="titulo-config">Configurações</h1>
        <br>
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
    <button type="" class="botao-acessibilidade1">Tradutor de Libras</button>
   <button id="btn-1" class="botao-acessibilidade2">Desligar</button>
</div>
  <div class="botao-acessibilidade-container2">
    <button class="botao-acessibilidade3">Alto Contraste</button>
    <button id="btn-2" class="botao-acessibilidade4">Ligar</button>

  </div>
  <div class="botao-acessibilidade-container3">
    <button class="botao-acessibilidade5">Daltonismo<br>(Escala Cinza)</button>
    <button id="btn-3" class="botao-acessibilidade6">Desligar</button>
  </div>
</div>
</div>
</div>
<?php
include "gerenciamento.php";
?>
<script>     
       const btn1 = document.getElementById("btn-1");
        btn1.addEventListener("click", ()=>{
            if(btn1.innerText === "Ligar"){
                btn1.innerText = "Desligar";
                btn1.style.backgroundColor = '#F4CCC8';
            }else{
                btn1.innerText= "Ligar";
                btn1.style.backgroundColor = '#D5ECB4';
            }
        })    
      

        const btn2 = document.getElementById("btn-2");
        btn2.addEventListener("click", ()=>{
            if(btn2.innerText === "Desligar"){
                btn2.innerText = "Ligar";
                btn2.style.backgroundColor = '#D5ECB4';
            }else{
                btn2.innerText= "Desligar";
                btn2.style.backgroundColor = '#F4CCC8';
            }
        })    
      
        const btn3 = document.getElementById("btn-3");
        btn3.addEventListener("click", ()=>{
            if(btn3.innerText === "Ligar"){
                btn3.innerText = "Desligar";
                btn3.style.backgroundColor = '#F4CCC8';
            }else{
                btn3.innerText= "Ligar";
                btn3.style.backgroundColor = '#D5ECB4';
            }
        })    

</script>
</body>
</html>