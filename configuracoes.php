<?php
include "include/MySql.php";
session_start();

$titulo = "Configurações";

$nome = "";
$idEmail = "";
$senha = "";

$nomeErro = "";
$idEmailErro = "";
$senhaErro = "";
$msgErro = "";

if (isset($_GET['id'])) {
  $idEmail = $_GET['id'];
  $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE idEmail = ?");
  if ($sql->execute(array($idEmail))) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($info as $key => $value) {
      $nome = $value['nome'];
      $idEmail = $value['idEmail'];
      $senha = ""; //$value['senha'];
    }
  }
}
include "head.php"
?>

<link rel="stylesheet" href="assets/css/configuracoes.css">

<body id="posts">
  
    <br>
    <div class="config">
      <h1 class="titulo-config">Configurações</h1>
      <br>
      <div class="config2">
        <h2 class="tipografia">Tipografia</h2>
        <h2 class="acessibilidade">Acessibilidade</h2>
      </div>
    </div>
    <div class="container-tipografia-acessibilidade">
      <div class="container">
        <div class="botao-tipografia-container">
          <button type="button" class="botao-tipografia1" id="botao-tipografia1" onclick="changeFont()">Merriweather</button>
          <button class="botao-tipografia2" onclick="changeFont1()">Source serif pro</button>
        </div>
        <div class="botao-tipografia-container2">
          <button class="botao-tipografia3" onclick="changeFont2()">Open Sans</button>
          <button class="botao-tipografia4" onclick="changeFont()">Noto sans</button>
        </div>
      </div>
      <div class="container-acessibilidade">
        <div class="botao-acessibilidade-container">
          <button type="" class="botao-acessibilidade1">Tradutor de Libras</button>
          <button id="btn-1" class="botao-acessibilidade2">Desligar</button>
        </div>
        <div class="botao-acessibilidade-container2">
          <button class="botao-acessibilidade3">Alto Contraste</button>
          <button id="btn-2" class="botao-acessibilidade4">Ligar</button>

        </div>
        <div class="botao-acessibilidade-container3">
          <button class="botao-acessibilidade5">Daltonismo<br>(Escala Cinza)</button>
          <button id="btn-3" class="botao-acessibilidade6">Desligar</button>
        </div>
      </div>
    </div>
    </div>

    <?php
    include "gerenciamento.php";
    ?>
  <script>
    function changeFont() {
      var fon = document.getElementById("posts");
      if (fon.className == "merriweather") {
        fon.className = 'open-sans';
      } else {
        fon.className = 'merriweather';
      }
    }

    function changeFont1() {
      var fon = document.getElementById("posts");
      if (fon.className == "source") {
        fon.className = 'open-sans';
      } else {
        fon.className = 'source';
      }
    }

    function changeFont2() {
      var fon = document.getElementById("posts");
      if (fon.className == "open-sans") {
        fon.className = 'open-sans';
      } else {
        fon.className = 'open-sans';
      }
    }

    function changeFont3() {
      var fon = document.getElementById("posts");
      if (fon.className == "noto-sans") {
        fon.className = 'open-sans';
      } else {
        fon.className = 'noto-sans';
      }
    }

    const btn1 = document.getElementById("btn-1");
    btn1.addEventListener("click", () => {
      if (btn1.innerText === "Ligar") {
        btn1.innerText = "Desligar";
        btn1.style.backgroundColor = '#F4CCC8';
      } else {
        btn1.innerText = "Ligar";
        btn1.style.backgroundColor = '#D5ECB4';
      }
    })


    const btn2 = document.getElementById("btn-2");
    btn2.addEventListener("click", () => {
      if (btn2.innerText === "Desligar") {
        btn2.innerText = "Ligar";
        btn2.style.backgroundColor = '#D5ECB4';
      } else {
        btn2.innerText = "Desligar";
        btn2.style.backgroundColor = '#F4CCC8';
      }
    })

    const btn3 = document.getElementById("btn-3");
    btn3.addEventListener("click", () => {
      if (btn3.innerText === "Ligar") {
        btn3.innerText = "Desligar";
        btn3.style.backgroundColor = '#F4CCC8';
      } else {
        btn3.innerText = "Ligar";
        btn3.style.backgroundColor = '#D5ECB4';
      }
    })
  </script>

<?php
include "footer.php";
?>