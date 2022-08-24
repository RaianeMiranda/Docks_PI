<!DOCTYPE html>
<html>
 
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <link rel="stylesheet" href="../css/input-gerenciamento.css">
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="email-gerenciamento">
            <p>Email: </p><input type="text" name="email">
            <span class="obrigatorio">*</span>
            <!-- <input type="submit" value="Alterar" name="submit"> -->
            <button type="button" class="botao-alterar1" data-toggle="modal" data-target="#exampleModalLong" style=" background-color: #D5ECB4;
  border: 2px solid #BBBBBB;
  height: 25px;
  width: 80px;
  font-weight: bolder;
  font-size: 15px;
  text-align: center;
  border-radius: 0px;">
                Alterar
            </button>
   
            <br>
        </div>
        <div class="senha-gerenciamento">
            <p>Senha: </p><input type="password" name="senha">
            <span class="obrigatorio">*</span>
            <button type="button" class="botao-alterar1" data-toggle="modal" data-target="#exampleModalLong" style=" background-color: #D5ECB4;
  border: 2px solid #BBBBBB;
  height: 25px;
  width: 80px;
  font-weight: bolder;
  font-size: 15px;
  text-align: center;
  border-radius: 0px;">
                Alterar
            <br>
        </div>
        <div class="botao-desativar-conta">
            <input type="reset" value="Desativar Conta" name="reset">
            <br>
        </div>
        <div class="botao-salvar-alteracoes">
            <input type="button" value="Salvar alterações" name="button">
        </div>
    </form>
    <span></span>
 
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-fechar" style=" position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 100%;
  pointer-events: auto;
  /* background-color: #fff; */
  background-clip: padding-box;
  border: 1px solid rgba(0,0,0,.2);
  border-radius: 0.3rem;
  outline: 0;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body">
        <?php
         include "alt.php";
        ?>
      </div>
    </div>
  </div>
</div>
</body>
 
</html>