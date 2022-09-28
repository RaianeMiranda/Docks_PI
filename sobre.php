<?php
session_start();
include "include/MySql.php";
$titulo = "Sobre nós";
include "head.php";
?>

<link rel="stylesheet" href="assets/css/metodo_criacao.css">

<body>
    <main>
        <h1><b>Sobre nós</b></h1>

        <div class="texto-sobre">
            <p>O Docks é uma plataforma de aprendizagem, que foi criado por
                leitoras com o objetivo de suprir a carência de aplicativos na área da escrita.
            </p>
            <p>
                O site proporciona a aprendizagem do método de escrita , o Snowflake e outros recursos como: Criação de Mundos, Personagens e o roteiro da Jornada do Herói. Além das atividades diárias para o aumento da criatividade.
            </p>
                <p>
                    O objetivo final é a criação de um livro bem estruturado, completo e sem furos.
                    Os escritores iniciantes são a nossa principal motivação, já que são pessoas independentes e sem auxílio algum, que através do Docks desenvolvem melhor a escrita e estrutura de seus livros, possibilitando assim o crescimento de escritores na literatura nacional.
                </p>
                <p>
                    A nossa equipe visa com o Docks tornar fácil a criação de um livro e aprendizado acessível para escritores .
                </p>
        </div>
    </main>
    <aside>
    <div class="flex-sobre">
        <div class="flex-sobre">
            <img class="sobre-img2" src="assets/images/dock_mao.png" alt="">
            <div>
                <ul class="sobre-ul">
                    <li><b>Dock</b></li>
                    <li> Idade:</li>
                    <li> Ocupação:</li>
                    <li> Signo: </li>
                    <li> Idade: </li>
                    <li> Backstory:</li>
                </ul>
            </div>
        </div>
        <div class="flex-sobre">
            <img class="sobre-img" src="assets/images/pate_personagem.png" alt="">
            <div>
                <ul class="sobre-ul">
                    <li><b>Paty</b></li>
                    <li> Idade:</li>
                    <li> Ocupação:</li>
                    <li> Signo: </li>
                    <li> Idade: </li>
                    <li> Backstory:</li>
                </ul>
            </div>
        </div>
        <div class="flex-sobre">
            <img class="sobre-img2" src="assets/images/mentor.png" alt="">
            <div>
                <ul class="sobre-ul">
                    <li><b>Mentor</b></li>
                    <li> Idade:</li>
                    <li> Ocupação:</li>
                    <li> Signo: </li>
                    <li> Idade: </li>
                    <li> Backstory:</li>
                </ul>
            </div>
        </div class="flex-sobre">

        <img class="sobre-img2" src="assets/images/psicopato.png" alt="">
        <div>
            <ul class="sobre-ul">
                <li><b>psicopato</b></li>
                <li> Idade:</li>
                <li> Ocupação:</li>
                <li> Signo: </li>
                <li> Idade: </li>
                <li> Backstory:</li>
            </ul>

        </div>
    </div>
    </aside>

    <?php
    include "footer.php";
    ?>