<title>Criar Livros</title>
</head>

<body>
    <div class="container">
        <div class="container-escrita">
            <span class="close">&times;</span>
            <h1 class="livro">Criar Livros</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="container-cores">
                    <div class="container-capa">
           
                           <img class="capa_livro" src="./assets/images/criar_livros.png" alt="" id="imagemTemp">


                    </div>

                    <div class="container-criar">
                        <div class="juncao-botao1">
                            <label for="upload_image" class="capa">
                                <img class="botao" src="assets/images/botao.png">
                            </label>
                            <input type="file" id="upload_image" name="image">
                        </div>
                    </div>
                    <div class="container-adicionar">
                        <h3 class="adicionar">Adicionando capa</h3>
                    </div>
                </div>
                <h2 class="titulo-criar_livros">Título</h2>
                <!-- <img src="" alt="" id="imagemTemp"> -->
                <div class="botao-criar_livros">
                    <input type="text" name="nome" placeholder="Adicione seu título *">
                    <span class="obrigatorio"><?php echo   $nomeLivroErro ?></span>

                    <div class="botao-flex">
                        <input class="botao-salvar" type="submit" value="Salvar" name="submit">
                    </div>
                </div>
            </form>
            <script>
                <?php  ?>
                const imgInp = document.getElementById("upload_image");
                const imagemTemp = document.getElementById("imagemTemp");
                imgInp.onchange = evt => {
                    const [file] = imgInp.files
                    if (file) {
                        imagemTemp.src = URL.createObjectURL(file)
                    }
                }
            </script>
            <span class="erro"><?php echo $msgErro ?></span>
</body>