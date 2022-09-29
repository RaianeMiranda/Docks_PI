<?php
session_start();
include "include/mysql.php";
?>
<?php
$titulo = "Método Snowflake";
include "head.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método Snowflake</title>
    <link rel="stylesheet" href="assets/css/metodo_criacao.css">
</head>
<body>
    <div class="container">
        <h1 class="titulo-snowflake">Snowflake</h1>
        <p>O nome deriva do inglês e significa “floco de neve”, e a ideia é visualizar o floco de neve como uma figura complexa, que é desenvolvida por formas simples que, quando colocadas uma junto à outra, evoluem até formar uma figura bem desenvolvida.
            Esse método é ótimo para você que tem uma ideia na cabeça, mas ainda não sabe como passá-la para o papel ou como organizá-la sem furos. O método pega o comecinho dessa ideia, da forma que ela surgiu e desenvolve através de alguns passos.
        </p>
        <br>
        <?php
        $sql = $pdo->prepare('SELECT * FROM SNOWFLAKE');
        if ($sql->execute()) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($info as $key => $value) {
        ?>
                <div class="etapa_1-container">
                    <h2 class="etapa">Etapa </h2>
                    <?php echo "<a class='etapa-descricao' href='etapa-snow.php?id=" . $value['codSnowflake'] . "'>" ?> <p class="etapa-descricao"><?php echo $value['nome_snow'] ."</p> </a>" ?>
                </div>


        <?php
            }
        }
        ?>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
<?php
include "footer.php";
?>