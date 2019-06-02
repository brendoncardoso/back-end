<?php

    //Conectando com o connection.php
    $conn = require __DIR__.'/utils/connection.php';

    //Criando uma tabela posts.
    $sql = '
        CREATE TABLE posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(50) NOT NULL,
            body TEXT NOT NULL,
            FULLTEXT title (title, body)
        )';

    //Se a tabela já existir, execute o die.
    if(!$conn->query($sql)){
        die('ERRO: ESSA TABELA JÁ EXISTE');
    }

    //Executando a tabela.
    $result = $conn->query('DESCRIBE posts');
    var_dump($result->fetch_all());