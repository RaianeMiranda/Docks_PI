<?php
    session_start();
    include "include/MySql.php";
    
    $codEtapas = "";
    $nome_etapas = "";
    $descricao= "";

    $msgErro="";

    if (isset($_GET['id'])){
        $codEtapas = $_GET['id'];
        //$_SESSION['codLivro'] = 1;
        $sql = $pdo->prepare("SELECT * FROM ETAPAS WHERE codEtapas = '?'");
        if ($sql->execute(array($codEtapas))){
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($info as $key => $value){                   
                $nome_etapas = $value['nome_etapas'];
                $descricao = $value['descricao'];
              
            }
        }
    }


    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
        if (empty($_POST['nome_etapas']));  
        else 
            $nome = $_POST['nome_etapas'];
        
        if (empty($_POST['descricao']));
        else    
            $email = $_POST['descricao'];
        

        if ($nome_etapas && $descricao ) {
            //Verificar se ja existe o email
            $sql = $pdo->prepare("SELECT * FROM ETAPAS WHERE codEtapas=?");
            if ($sql->execute(array($codEtapas))){
                if ($sql->rowCount() <= 0){
                    $sql = $pdo->prepare("UPDATE ETAPAS SET  
                                                             nome_etapas=?,
                                                             descricao=?,
                                                       WHERE codEtapas=?");

                    if ($sql->execute(array($codEtapas,$nome_etapas,$descricao,$codEtapas))){
                        $msgErro = "Dados alterados com sucesso!";
                        header('location:snowetapa.php');
                    } else {
                        $msgErro = "Dados não cadastrados!";
                    }  
                }
            } else {
                $msgErro = "Erro no comando UPDATE!";
            }    
        } else {
            $msgErro = "Dados não alterados!";
        }                    
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<body>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Alteração de etapas</legend>

            Nome da etapa: <br>
            <input type="text" name="nome_etapas" value="<?php echo $nome_etapas?>">
            <br>
            Descrição da etapa: <br>
            <textarea type="text" name="descricao" value="<?php echo $descricao?>"></textarea>
            <br>           
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro?></span>
</body>
</html>