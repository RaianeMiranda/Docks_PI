<?php
session_start();
include "include/MySql.php";
$titulo = "Método Criação de Mundo";
include "head.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método Criação de Mundo</title>
    <link rel="stylesheet" href="assets/css/metodo_criacao.css">
</head>

<body>
    <div class="container">
        <h1 class="metodo-cp-titulo">Criação de Mundo </h1>
        <div class="descricao-container">
            <p>Na sua história pode ser usado:
            </p>
            <br>
            <ul class="camadas-container">

                <li class="camadas-li">
                    <span class="camadas-mundo"><a class="camadas-mundo" href="inicial.php">Um universo totalmente diferente:</a>
                    </span><span> Escrever um universo totalmente diferente é complicado, porque nosso imaginário é baseado no que conhecemos. Mas deve se considerar essa categoria quando uma história de ficção não tem referências óbvias à realidade, podendo ter distinções drásticas em relação à vida na terra. Por exemplo, se passa em um universo onde a atmosfera é diferente e os personagens não são humanos.
                    </span>
                </li>
                <br>
                <li class="camadas-li">
                    <span class="camadas-mundo"><a class="camadas-mundo" href="inicial.php"> Um universo inspirado no nosso:</a>
                    </span><span> Um universo inspirado no nosso, por sua vez, tem países e costumes semelhantes aos que conhecemos, mas com nomes diferentes e possivelmente magia e/ou tecnologia que não existem no mundo real. Um bom exemplo são As Crônicas de Gelo e Fogo de George R. R. Martin. Identificamos Westeros facilmente com a Europa, além de facilmente compreendermos a estrutura social e o governo. A série tem um tom quase realista, mas com dragões e “zumbis”.</span>
                </li>
                <br>
                <li class="camadas-li">
                    <span class="camadas-mundo"> <a class="camadas-mundo" href="inicial.php"> Um universo que supostamente é o nosso, mas com diferenças pontuais:</a>
                    </span> <span> Quando uma história se passa em um universo que supostamente é o nosso, mas com diferenças pontuais, isso significa que esse mundo tem referências geográficas iguais às nossas. Contudo, algo ali é fundamentalmente diferente da realidade. Pode ser a presença de magia, pode ser uma sociedade futurista ou pode até mesmo ser um universo sem nada disso, mas no qual um evento histórico terminou de forma diferente, provocando mudanças em série. Por exemplo, imagine escrever uma história que se passe em um Brasil sem colonização.</span>
                </li>
                <br>
                <li class="camadas-li">
                    <span class="camadas-mundo"> <a class="camadas-mundo" href="inicial.php">Um universo paralelo ao nosso, que pode ser acessado por tecnologia ou magia:</a></span><span> Por fim, o universo paralelo é aquele que existe ao mesmo tempo que o nosso. Em outras palavras, o seu protagonista poderia viver aqui, no Brasil, e de repente encontrar um portal mágico que o leva para esse mundo totalmente diferente. Também vale para histórias com uma pegada tecnológica, e esse universo paralelo não necessariamente precisa ser, de fato, outro universo. Pode ser apenas um outro planeta, por exemplo, ou quem sabe uma projeção de realidade virtual.
                        Entender onde o seu universo fictício se situa em relação à realidade é um ótimo ponto de partida, pois ajuda você a identificar o quanto você precisará trabalhar na criação de novos cenários e regras sociais e o quanto do mundo que você já conhece pode ser utilizado na sua história.</span>
                </li>
            </ul>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>