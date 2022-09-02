<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                <p  class="resultado" id="resultado">.</p>

                <script type="text/javascript">
                function range() {
                    let resultado = document.getElementById("resultado");
                    let valor = document.getElementById("valor").value;
                    resultado.innerHTML = valor
                }

                range()

                document.addEventListener("change", range);
                </script>
              


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="assets/css/helena.css">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterações</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>