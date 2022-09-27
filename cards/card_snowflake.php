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
                            <img class="card-img-top1 logo" src="assets/images/docks.png" alt="Card image cap">
                        </div>
                        <h4> <a class="titulo_top-card snow-title" href="metodo_snowflake.php"> Método Snowflake</a></h4>
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                        </div>
                    </div>
                    <?php
                    $sql = $pdo->prepare('SELECT * FROM snowflake');
                    if ($sql->execute()) {
                        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
                        if (count($info) > 0) {
                            foreach ($info as $key => $values) {
                    ?>

                                <div class="snow-card card">
                                    <div class="snow-top card-top">
                                        <h4 class="card-text"><?php echo $values['nome_snow'] ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $values['descricao']; ?></p>
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


</body>

</html>