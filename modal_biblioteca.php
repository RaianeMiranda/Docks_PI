<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
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
            <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-fechar" style=" 
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
  border-radius: 0.3rem;
  outline: 0;">
  <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="    position: fixed;
    margin-left: 420px;
    height: 5px;
    width: 10px;">
          <span aria-hidden="true">&times;</span>
        </button>
          <?php
          include "criar_livros.php";
          ?>
        </div>
    </div>
  </div>
</div>
</body>
</html>
