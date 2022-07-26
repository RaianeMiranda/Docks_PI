<?php
session_start();
include "include/MySql.php";
$titulo = "Método Criação de Personagem";
include "head.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método Criação de Personagem</title>


    <link rel="stylesheet" href="assets/css/metodo_criacao.css">
</head>

<body>
    <div class="container">
        <h1 class="metodo-cp-titulo-persona">Criação de Personagem </h1>
        <div class="descricao-container">
            <p>Uma boa narrativa quase sempre é movida por personagens marcantes. Às vezes, marcantes em suas grandiosas personalidades e habilidades mirabolantes. Outras, ficam presas na nossa memória por sua pura simplicidade e realismo, que remete intimamente às nossas vidas.
            </p>
            <p class="juncao"> O que não muda de um modelo para o outro é que uma boa personagem é uma personagem complexa, bem desenvolvida. E esse desenvolvimento é feito em camadas.</p>

            <p class="separado">Na metodologia a ser apresentada, trabalharemos com três níveis de criação. </p>
        </div>
        <br>
        <ul class="camadas-container">

            <li class="camadas-li">
                <span class="camadas"><a class="camadas" href="inicial.php">Camada periférica:</a></span> <span> É a parte mais fácil e rápida a ser feita para criar o seu personagem. Aqui vamos pensar em como nosso personagem é fisicamente, como ele se comunica com outras pessoas e os dados básicos.</span>
            </li>

            <li class="camadas-li">
                <span class="camadas"><a class="camadas" href="inicial.php"> A camada de entorno: </a></span><span>Nesta camada, entenderemos como o personagem chegou até aqui, analisando seu histórico de vida e como foi moldada a sua personalidade. Basicamente é a biografia dele.
                </span>
            </li>
            <li class="camadas-li">
                <span class="camadas"> <a class="camadas" href="inicial.php">A camada central:</a></span><span> Talvez a etapa mais desafiadora na hora de criar a ficha de personagem. Aqui desenvolvemos a alma, a essência do personagem.
                </span>
            </li>

        </ul>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php
    include "footer.php";
    ?>