<?php
include "head.php"
?>
    <link rel="stylesheet" href="assets/css/modal.css">
<body>
    <a href="paginas/cad_usuario.php"><button>Cadastre-se</button></a>
    <a href="login_adm.php"><button>Administrador</button></a>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Login</button>
<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <?php include "login.php" ?>
</div>



<?php
include "footer.php"
?>