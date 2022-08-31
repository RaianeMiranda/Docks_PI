<?php
    define('HOST', 'localhost');
    define('DB', 'pi_docks');
    define('USER', 'root');
    define('PASS', '');
    define('PORT', '3306');

    try{
        $pdo /*php data object*/ = new PDO('mysql:host='.HOST.';port='.PORT.'; dbname='.DB,USER,PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")); //essa linha serve para ele reconhecer comandos e leitura em utf8
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Caso der erro ele traduz o binario em inglês
    }catch(exception $e){
        echo "Erro: $e";
    }
?>