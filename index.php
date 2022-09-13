<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/biblioteca.css">
  <link rel="stylesheet" href="assets/css/botao.css">
  <title>biblioteca </title>

</head>

<body>
  <center>
    <h1>Biblioteca</h1>
  </center>
  <button>
    <h2> + Criar novo Livro </h2>
  </button>
  <!--container-->
  <div class="container">
    <div class="livros1">
      <img class="dock" src="assets/images/dock1.png">
      <h2 align="middle">Alice na Favela </h2>
      <p>20 Capítulos|12 Marcações</p>
      <div class="container-leitura">
        <button class="dock">
          <h2> Escrever... </h2>
        </button>
        <div class="dropdown container-bt">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Editar Livro</a></li>
            <style>
              .dropdown-item:focus {
                background-color: #FED576;
                border-color: #FED576;
              }

              .dropdown-menu>a:hover {
                background-color: transparent;
                border-color: #FED576;
              }

              .dropdown-menu show {
                border-color: #FED576;
              }

              .dropdown-menu {
                border: 1px solid #FED576;
              }

              hr {
                /*color: #FED576;*/
                /*background-color: #FED576;*/
                margin: 0px;
                border: 1px solid #FED576;
                opacity: none;
                /* opacity: .25;*/
              }
            </style>
            <hr>
            <li><a class="dropdown-item" href="#">Excluir Livro</a></li>

          </ul>
        </div>
      </div>
    </div>
    <div class="livros">
      <div class="livros2">
        <img class="mentor" src="assets/images/mentor2.png">
        <div class="legenda">
          <h2 align="middle">Alice na Favela </h2>
          <p>20 Capítulos|12 Marcações</p>

          <div class="container-leitura">
            <button class="mentor">
              <h2> Começar a ler </h2>
            </button>
            <div class="dropdown container-bt">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Editar Livro</a></li>
                <li><a class="dropdown-item" href="#">Excluir Livro</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="livros">
        <div class="livros3">
          <img class="pate" src="assets/images/pate3.png">
          <div class="legenda">
          <h2 align="middle">Alice na Favela </h2>
          <p>20 Capítulos|12 Marcações</p>

          <div class="container-leitura">
            <button class="pate">
              <h2> Começar a ler</h2>
            </button>
            <div class="dropdown container-bt">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Editar Livro</a></li>
                <li><a class="dropdown-item" href="#">Excluir Livro</a></li>
              </ul>
            </div>
          </div>
            </div>
          <style>
            .container-leitura {
              display: flex;
            }

            .container-bt button {
              height: 100%;
              width: 30px;
              background-color: transparent;
              background-image: url('assets/images/dot.png');
              background-position: center;
              background-size: 80%;
              background-repeat: no-repeat;
            }
          </style>
        </div>

      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>