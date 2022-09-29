<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/card_style.css">
    <title>Teste de carousel cards</title>
</head>

<body>
    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" data-interval="0">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card-wrapper">
                    <div class="snow-card card">
                        <div class="card-img-top1">
                            <img class="card-img-top1 icone" src="assets/images/snow.png" alt="Card image cap">
                        </div>
                        <h4> <a class="titulo_top-card snow-title" href="metodo_snowflake.php"> Método Snowflake</a></h4>
                        <div class="card-body">
                            <p class="card-text">O nome deriva do inglês e significa “floco de neve”, e a ideia é visualizar o floco de neve como uma figura complexa, que é desenvolvida por formas simples que,</p>
                        </div>
                    </div>
                    <?php
                    $sql = $pdo->prepare('SELECT * FROM SNOWFLAKE');
                    if ($sql->execute()) {
                        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
                        if (count($info) > 0) {
                            foreach ($info as $key => $values) {
                    ?>

                                <div class="snow-card card">
                                    <div class="snow-top card-top">
                                        <h4 class="card-text"> <a class="etapa-descricao"  href= "<?php echo "etapa-snow.php?id=" . $values['codSnowflake'] . "'" ?>"> <?php echo $values['nome_snow'] ?> </a> </h4>
                                    </div>
                                    <div class="card-body">
                                        <p><?php echo $values['descricao']; ?></p>
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
