<?php
$nome_cap = "";


$sql = $pdo->prepare("SELECT * FROM LIVROS WHERE nomeLivro = ?");
if ($sql->execute(array($_SESSION['nomeLivro']))) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
        foreach ($info as $key => $values) {
            $_SESSION['codLivro'] = $values['codLivro'];
        }
    } else {
        $_SESSION['codLivro'] = 0;
    }
}
?>

<link rel="stylesheet" href="assets/css/cads_usuario.css">

<h1 class="title_cap">Capítulos</h1>
<div class="list_cap">
    <?php
    $sql = $pdo->prepare('SELECT * FROM capitulo WHERE codLivro=?');
    if ($sql->execute(array($values['codLivro']))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($info) > 0) {
            foreach ($info as $key => $values) { ?>

                <div class="separando">
                    <fieldset class="field_cap">
                        <small class="small_cap">Capítulo <?php echo $values['codCapitulo'] ?></small>
                        <div class="flex_cap"> <button class="cap" type="button">
                                <?php echo "<a class='a_cap' href='escrever_cap.php?id=" . $values['codCapitulo'] . "'> " ?> <?php echo $values['nome_cap'] . "</a>" ?>
                            </button>
                            <a class="sgv-cap" href="<?php echo "del_capitulo.php?id=" . $values['codCapitulo'] . "" ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg></a>
                        </div>

                    </fieldset>
                </div>
    <?php

            }
        }
    }
    ?>
</div>