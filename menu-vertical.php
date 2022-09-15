<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/tipografia.css">
</head>
<body>
  <header>
    <nav id="nav">
      <button id="btn-mobile">Menu</button>
      <div class="side-bar">
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
  <script>
    const btnMobile = document.getElementById('btn-mobile');
    function toggleMenu(){
      const btnMobile = document.getElementById('menu');
      nav.classList.toggle('active')
    }
    btnMobile.addEventListener('click',toggleMenu);
  </script>
</body>
</html>