<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/modal.css">
</head>

<body>

    <h2>Modal Example</h2>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Login-</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="login-form">
            <div class="todoLogin">
                <div class="login_cima">
                    <div class="container">
                        <div class="flex2">
                            <img class="logo" src="assets/images/logo.png" alt="logo do site, sendo um círculo com nosso mascote docks, um pato dentro desse círculo.">
                        </div>
                        <div class="flex3">
                            <span class="close">&times;</span>
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

                    <a href="#"><button class="continuar"> Continuar </button></a>

                    <p class="ou">OU</p>
                </div>

                <div class="login-baixo">

                    <fieldset>
                        <div class="flex">
                            <img class="icon-login" src="assets/images/facebook.png" alt="Faça seu login com o Facebook">
                            <a href="#"><button class="login-with">Continue com o Facebook </button></a>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="flex">

                            <img class="icon-login" src="assets/images/google.png" alt="Faça seu login com o Facebook">
                            <a href="#"><button class="login-with">Continue com o Google </button></a>
                        </div>
                    </fieldset>
                    <p>Ainda não é um membro?</p>
                    <p><a href="#"><button class="membro">Cadastre-se</button></a></p>

                </div>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>