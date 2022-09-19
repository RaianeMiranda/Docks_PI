<?php
include "head.php"
?>
    <link rel="stylesheet" href="assets/css/modal.css">
<body>
    <a href="paginas/cad_usuario.php"><button>Cadastre-se</button></a>
    <a href="login._adm.php"><button>Administrador</button></a>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Login</button>
<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <?php include "login.php" ?>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>