<?php
   session_start();
   include "include/MySql.php";

   if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $descricao = $_POST['descricao'];
    $nome_etapas =$_POST['nome_etapas'] ;
    $sql = $pdo->prepare("INSERT INTO etapas (codEtapas, codSnowflake, codLivro, descricao, nome_etapas)
VALUES (?, ?, ?, ?,NULL,)");
if ($sql->execute(array($descricao, $nome_etapas))) {
     $msgErro = "Dados cadastrados com sucesso!";
    $_SESSION['codSnowflake'] = $codSnowflake;
     $codSnowflake="";
    }
     else {
        $msgErro = "Dados não cadastrados!";
    }
}
?>


   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){

                if (empty($_POST['nome_etapas']))
                else 
                    $nome_etapas = $_POST['nome_etapas'];

                if (empty($_POST['descricao']))    
                else    
                    $descricao = $_POST['descricao'];
                
                }
            
        
    

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
    <label>Nome da etapa:</label>
        <br>
        <input type="texto" name="nome_etapas" id="nome_etapas" value="<?php echo $nome_etapas?>">
        <br>
        <p>Descrição da etapa Snowflake:
            <br>
            <textarea type="texto" name="descricao" id="descricao" value="<?php echo $descricao?>"></textarea>
            <br>
            <br>
            <input type="submit" value="salvar" name="submit">

    </form>
    <span><?php echo $msgErro?></span>
</body>

</html>