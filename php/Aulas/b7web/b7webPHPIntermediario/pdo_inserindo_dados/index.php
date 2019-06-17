<?php
    $dsn = "mysql:dbname=blog; host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        $nome = "Testador 3";
        $email = "testador3@testador.com";
        $senha = md5("123");

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        $sql = $pdo->query($sql);


        echo "Usuário inserido com sucesso: ".$pdo->lastInsertId($nome);
    }catch(PDOException $e){
        echo "Falhou: ".$e->getMessage();
    }
?>