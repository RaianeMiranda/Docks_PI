<nav>
    <div class="all-form">
        <div class="item">
          <div class="container-menu_logo">
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
              <a class="links" href="#">
                Biblioteca
              </a>
              <a class="links" href="#">
                Jornada do Herói
              </a>
              <a class="links" href="#">
                Snowflake
              </a>
              <a class="links" href="#">
                Criação de Mundos
              </a>
              <a class="links" href="#">
                Criação de Personagens
              </a>
              <a class="links" href="#">
                Sobre Nós
              </a>
              <a class="links" href="configuracoes.php">
                Configurações
              </a>
              <a class="links" href="#">
                Sair (logout)
              </a>
            </div>
          </div>
        </div>
        <div class="image-nome">
                <img src="assets/images/docks.png" class="logotipo">
                <h1 class="nome">Docks</h1>
</div>
            </div>
        </div>
</div>
        <ul>
            <li><b><a class="link" href="personagens.php">Criação de Personagens</a></b></li>
            <li><b><a class="link" href="biblioteca.php">Biblioteca</a></b></li>
            <li><b><a class="link" href="jornada.php">Jornada do Herói</a></b></li>
            <li><b><a class="link" href="snowflake.php">Snowflake</a></b></li>
            <li><b><a class="link" href="mundos.php">Criação de Mundos</a></b></li>
        </ul>
        <hr class="linha">
    </div>
    <script type="text/javascript">
    $('.menu-btn').click(function() {
      $('.side-bar').addClass('active');
    });

    $('.close-btn').click(function() {
      $('.side-bar').removeClass('active');
    });
  </script>
</nav>