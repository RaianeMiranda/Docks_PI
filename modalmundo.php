<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css">
  
</head>
<body>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="text-align: center;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
	    <div class="modal-header" style="height: 60px;">
	        <h2 class="modal-title col-md-11" id="exampleModalLongTitle" style="color:red;">Título</h2>
		<button type="button" class="close col-md-1" data-dismiss="modal" aria-label="Close">
		    <span aria-hidden="true">×</span>
		</button>
	   </div>
	   <div class="modal-body">
	       <h3>Corpo da mensagem da modal bootstrap</h3><br>
	   </div>
	   <div class="modal-footer">
	       <button type="button" class="btn btn-danger col-md-4" data-dismiss="modal">
                   Fechar
              </button>
	      <a href="https://diretoaoponto-tech.com.br/">
                 <button type="button" class="btn btn-success col-md-4 offset-md-4">Destino de sucesso
                 </button>
               </a>
	  </div>
      </div>
  </div>
  <script type="text/javascript">
    $(window).on('load',function(){
    $('#myModal').modal('show'); });
</script>
</div>
</body>
</html>