<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/inicial.css">
    <title>Document</title>
</head>

<body>
    <?php include "head.php" ?>
    <header>
        <h1 class="title_welcome">Bem vindo(a), escritor(a)</h1>
        <h3 class="before_course">Para desbloquear as fases, crie um livro</h3>
        <a href="#"><button class="criar_livro" type="submit"> <i class="fa-solid fa-plus"></i> Criar novo Livro</button></a>
    </header>
    <main>
        <?php 
        include "card_heroi.php";
        include "card_snowflake.php";
        include "card_mundo.php";
        include "card_persona.php";
        ?>
        
    </main>
</body>

</html>