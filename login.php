<?php
include "libras.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://kit.fontawesome.com/9e39b5f510.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="login-form">
        <div class="todoLogin">
            <div class="login_cima">
                <div class="container">
                <div class="flex2">
                    <img class="logo" src="assets/images/logo.png" alt="logo do site, sendo um círculo com nosso mascote docks, um pato dentro desse círculo.">
                </div>
                <div class="flex3">
                    <button class="exit-icon"><i class="fa-solid fa-xmark"></i></button>
                    <!--CONTINUAR DAQUI, CRIAR GRID PARA SEPARAR ÍCONE DA LOGO-->
                </div>
                </div>

                <h1 class="slogan">Bem vindo(a) ao Docks</h1>
                <p class="slogan">Aqui é o lugar para suas histórias</p>
            </div>

            <div class="login-meio">
                <fieldset>
                    <legend>Digite seu E-mail</legend>
                    <input class="norm-login" type="text" placeholder="E-mail">
                </fieldset>

                <fieldset>
                    <legend>Digite sua Senha</legend>
                    <input class="norm-login" type="password" placeholder="Senha">
                </fieldset>

                <button class="continuar"> Continuar </button>

                <p class="ou">OU</p>
            </div>

            <div class="login-baixo">

                <fieldset>
                    <div class="flex">
                        <img class="icon-login" src="assets/images/facebook.png" alt="Faça seu login com o Facebook">
                        <button class="login-with">Continue com o Facebook </button>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="flex">

                        <img class="icon-login" src="assets/images/google.png" alt="Faça seu login com o Facebook">
                        <button class="login-with">Continue com o Google </button>
                    </div>
                </fieldset>
                <p class="membro">Já é um membro? <button>Entrar</button></p>

            </div>
        </div>

    </div>
    <!-- 
            <div class="login-meio">
            <label for="e-mail">E-mail</label>
            <input class="" type="text" name="email" id="e-mail" placeholder="Digite seu E-mail">
            </div>
        -->


    </div>
    </div>
    </div>
</body>

</html>