<?php

    //Conectando com o connection.php
    $conn = require __DIR__.'/utils/connection.php';

    //Operador Ternário.
    $term = $argv[1]? $argv[1]: NULL;
    //Fazendo busca por Relevância
    $term = '%'.$term.'%';
    //SELECIONE TODOS A PARTIR DE title e body CONTRA ? EM MODO BOOLEANO PARA posts ORDENANDO score POR ORDEM DECRESCENTE.
    $stmt = $conn->prepare('SELECT *, MATCH(title, body) AGAINST(? IN BOOLEAN MODE) AS score FROM posts ORDER BY score DESC');
    //$stmt recebe a string $term
    $stmt -> bind_param('s', $term);
    //Executando $stmt
    $stmt -> execute();
    
    //Executando Query.
    $result = $stmt->get_result();
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    foreach($posts as $post){
        echo PHP_EOL;
        echo $post['title']. PHP_EOL;
        echo $post['body']. PHP_EOL;
        echo $post['score']. PHP_EOL;
        echo PHP_EOL;
    }

