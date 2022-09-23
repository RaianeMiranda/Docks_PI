<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                        <h4 class="titulo_top-card persona-title">Jornada do Herói</h4>
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
    <a class="carousel-control-prev" href="#carouselExampleControls4" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="false"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls4" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="false"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/9e39b5f510.js" crossorigin="anonymous"></script>
</body>

</html>