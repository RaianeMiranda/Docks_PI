<head>

</head>
</main>
<hr class="linha">
<ul>
    <div class="logo_footer">
        <div class="logo_flex">
            <div><img class="logo" src="assets/images/logo.png" alt=""></div>
            <div>
                <h3 class="text_footer">DOCKS</h3>
                <h5 class="text_footer">Aqui é o lugar para as suas histórias</h5>
            </div>
        </div>
        <p class="text_footer">Lorem, ipsum dolor sit amet consectetur adipisicing elit excepturi consequatur nulla doloribus.</p>
    </div>
    <div>

        <li><a href="">Biblioteca</a></li>
        <li><a href="">Conta</a></li>
        <li><a href="">Sobre nós</a></li>
        <li><a href="">Configurações</a></li>
    </div>
    <div>
        <li><a href="">Jornada do Herói</a></li>
        <li><a href="">Snowflake</a></li>
        <li><a href="">Criação de Mundos</a></li>
        <li><a href="">Criação de Personegens</a></li>
    </div>
    <div>
        <li><a href="">Facebook</a></li>
        <li><a href="">Instagram</a></li>
        <li><a href="">Email</a></li>
    </div>
</ul>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>



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

</html>