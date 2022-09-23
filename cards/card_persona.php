<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/card_style.css">
    <title>Teste de carousel cards</title>
</head>

<body>
    <div id="carouselExampleControls4" class="carousel slide" data-ride="carousel" data-interval="0">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card-wrapper">
                    <div class="persona-card card">
                        <div class="card-img-top1">
                            <img class="card-img-top1 logo" src="assets/images/docks.png" alt="Card image cap">
                        </div>
                        <h4 class="titulo_top-card snow-title"> <a href="../metodo_criacao_de_personagem.php">Criação de Personagem</a></h4>
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                        </div>
                    </div>
                    <?php
                    $sql = $pdo->prepare('SELECT * FROM personagens');
                    if ($sql->execute()) {
                        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
                        if (count($info) > 0) {
                            foreach ($info as $key => $values) {
                    ?>

                                <div class="persona-card card">
                                    <div class="persona-top card-top">
                                        <h4 class="card-text"><?php echo $values['nome_persona'] ?></h4>
                                        <div class="dropdown container-bt">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Editar Livro</a></li>
                                                <li><a class="dropdown-item" href="<?php echo "<a href='paginas/delPersonagem.php?id=".$values['codPersonagens']."'"?>">Excluir Livro</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $values['descricao'] ?></p>
                                    </div>
                                </div>

                    <?php

                            }
                        }
                    }
                    ?>




                </div>
            </div>

        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>