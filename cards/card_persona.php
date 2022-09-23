<?php
$sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
if ($sql->execute(array($_SESSION['nomeLivro']))) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
            $_SESSION['codLivro'] = $values['codLivro'];
        }
    } else {
        $_SESSION['codLivro'] = 0;
    }
}
echo "aqui:" . $_SESSION['codLivro'];
?>

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
            <div class="card-wrapper">
                <div class="persona-card card">
                    <div class="card-img-top1">
                        <img class="card-img-top1 logo" src="assets/images/docks.png" alt="Card image cap">
                    </div>
                    <h4 class="titulo_top-card snow-title"> <a href="metodo_criacao_de_personagem.php">Criação de Personagem</a></h4>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the card's
                            content.</p>
                    </div>
                </div>
                <?php

                        $sql = $pdo->prepare('SELECT * FROM personagens WHERE codLivro=?');
                        if ($sql->execute(array($values['codLivro']))) {
                            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
                            if (count($info) > 0) {
                                foreach ($info as $key => $values) {
                ?>

                                    <div class="persona-card card">
                                        <div class="persona-top card-top">
                                            <a href="<?php echo 'paginas/personagem.php?id=' . $values['codPersonagens'] ?>">
                                                <h4 class="card-text"><?php echo $values['nome_persona'] ?></h4>
                                            </a>
                                            <div class="dropdown container-bt">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="<?php echo 'paginas/delPersonagem.php?id=' . $values['codPersonagens'] ?>">Excluir Livro</a></li>
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

                <div class="criando">
                    <input type="button" value="(+)" onclick="parent.location='paginas/cad_persona.php'">
                </div>



            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>