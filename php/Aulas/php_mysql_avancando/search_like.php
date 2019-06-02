<?php
    
    //Conectando com o connection.php
    $conn = require __DIR__.'/utils/connection.php';

    //Operador Ternário
    $term = $argv[1]? $argv[1]: NULL;
    //Fazendo busca por Relevância
    $term = '%'.$term.'%';
    //SELECIONE TODOS DE posts ONDE title PROCURE POR ? 
    $stmt = $conn->prepare('SELECT * FROM posts WHERE title LIKE ?;');
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
        echo PHP_EOL;
    }


