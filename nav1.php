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
                <div class="btn-modal">
                <button class="btn-login" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" margin-left: 1250px;
 text-align:center;
 background-color: #F4CCC8;
    border: 2px solid #DBACA7;
    width:50px;
    font-size: 11px;
    height:23px;
    border-radius:3px;
    font-weight: bolder;
    color:black;
    color: #fff;
    margin-bottom:20px;
">
  Login
</button>
<button class="adm" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2" style=" margin-left: 1310px; 
border:none;
color:black;
background-color:transparent;
">
  Administrador
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" style="position: fixed;">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <?php
        include "login1_0.php";
        ?>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" style="position: fixed;">
      <div class="modal-header2">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <?php
        include "login3_0.php";
        ?>
      </div>
    </div>
  </div>
</div>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</nav>