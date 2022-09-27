<?php
$nomeLivro = "";
$nomeLivroErro = "";
$msgErro = "";
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);
            if (empty($_POST['nome']))
                $nomeLivroErro = "Nome é obrigatório!";
            else
                $nomeLivro = $_POST['nome'];
            if ($nomeLivro) {
                //Verificar se ja existe o idEmail
                $sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
                if ($sql->execute(array($nomeLivro))) {
                    if ($sql->rowCount() <= 0) {
                        $sql = $pdo->prepare("INSERT INTO LIVROS (codLivro, nomeLivro, capaLivro, idEmail)
                              VALUES (NULL, ?, ?, ?)");
                        $msgErro = "Erro no comando SELECT!";
                        if ($sql->execute(array($nomeLivro, $imgContent, $_SESSION['idEmail']))) {
                            $msgErro = "Dados cadastrados com sucesso!";
                            $_SESSION['nomeLivro'] = $nomeLivro;

                            header('location:inicial.php');
                        } else {
                            $msgErro = "Dados não cadastrados!";
                        }
                    }
                } else {
                    $msgErro = "Dados não cadastrados!";
                    $msgErro = "Erro no comando SELECT!";
                }
            } else {
                $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
                $msgErro = "Dados não cadastrados!";
            }
        } else {
            $msgErro = "Imagem não selecionada!!";
            $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
        }
    } else {
        $msgErro = "Imagem não selecionada!!";
    }
}
?>


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
                        <h3> <input class="botao-salvar" type="submit" value="Salvar" name="submit"></h3>
                    </div>
                </div>
            </form>
        </div>
    </div>
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