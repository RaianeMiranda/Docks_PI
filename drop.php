
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <div class="tipografia-titulo">
            <h5 class="n-tipografia"><b>Negrito</b></p>
                <h5 class="i-tipografia"><i>Itálico</i></p>
        </div>
        <div class="bnt-tipografia">
            <button class="negrito-tipografia"><b>B</b></button>
            <button class="italico-tipografia"><i>I</i></button>
        </div>
        <div class="tamanho">
            <h5 class="tamanho-titulo"><b>Tamanho</b></h5>
        </div>
        <input type="range" min="0" max="100" value="50" class="estilo" id="valor">
        <br>
        <p class="resultado" id="resultado">.</p>

        <script type="text/javascript">
        function range() {
            let resultado = document.getElementById("resultado");
            let valor = document.getElementById("valor").value;
            resultado.innerHTML = valor
        }

        range()

        document.addEventListener("change", range);
        </script>

        <h5 class="marcadores"><b>Marcadores</b></h5>

        <div class="container-marcador1">
            <button type="button" class="btn1"></button>

            <button type="button" class="btn2"></button>

            <button type="button" class="btn3"></button>

        </div>
        <div class="container-marcador2">
            <button type="button" class="btn4"></button>

            <button type="button" class="btn5"></button>

            <button type="button" class="btn6"><b>nenhum</b></button>


        </div>
    </div>
