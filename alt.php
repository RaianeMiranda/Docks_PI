<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterações da conta</title>
    <?php
    $titulo = "Alterações da conta";
    ?>
    <link rel="stylesheet" href="assets/css/alt.css">
</head>

<body>
    <div class="alt-container">
        <div class="container-alteracao">
            <div class="alt-titulo">
                <h1>Alterações da conta</h1>
                <br>
            </div>
            <p class="alt-1"><b>Altere suas Informações</b></p><input type="text" placeholder=" Seu E-mail Atual" readonly>
            <br>
            <input type="text" placeholder="Altere Nome">
            <br>
            <p class="alt-2"><b>Altere sua senha</b></p><input type="password" placeholder=" Sua senha atual">
            <br>
            <input type="password" placeholder=" Sua nova senha">
            <br>
            <form>
                <button>Salvar</button>
            </form>
        </div>
    </div>


</body>

</html>