<?php
    $dsn = "mysql:dbname=estrutura_banco_de_dados; host: localhost";
    $dbuser = "root";
    $dbpass = "";
    
    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        echo "Conexão Estabelecida com Sucesso!";
    }catch(PDOException $e){
        echo "Falhou em: ".$e->getMessage();
    }
?>