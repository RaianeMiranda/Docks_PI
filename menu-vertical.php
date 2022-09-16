<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/tipografia.css">
</head>

<body>
  <header>
    <nav id="nav">
      <div class="container-menu">
        <div class="menu-btn">
          <i class="fas fa-bars"></i>
        </div>
        <div class="side-bar">
        <div class="close-btn">
            <i class="fas fa-times"></i>
          </div>
          <div class="nav-cabecalho">
            <div class="imagens">
              <div class="container-perfil">
                <div class="nome-usuario">
                  <img class="image2" src="assets/images/usuario.png" alt="">
                </div>
                <div class="nome-email">
                  <h4 class="nome-fulana">Fulana Ciclana</h4>
                  <p class="email-fulana">fulana65@gmail.com</p>
                </div>
              </div>
            </div>
          </div>
          <div class="menu">
            <div class="item">
              <a href="#">
                Biblioteca
              </a>
              <a href="#">
                Jornada do Herói
              </a>
              <a href="#">
                Snowflake
              </a>
              <a href="#">
                Criação de Mundos
              </a>
              <a href="#">
                Criação de Personagens
              </a>
              <a href="#">
                Sobre Nós
              </a>
              <a href="configuracoes.php">
                Configurações
              </a>
              <a href="#">
                Sair (logout)
              </a>
            </div>
          </div>
        </div>
    </nav>
  </header>
  <script type="text/javascript">
    $('.menu-btn').click(function() {
      $('.side-bar').addClass('active');
    });

    $('.close-btn').click(function() {
      $('.side-bar').removeClass('active');
    });
  </script>
</body>

</html>