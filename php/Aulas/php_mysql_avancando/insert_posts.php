<?php
    
    //Conectando com o connection.php
    $conn = require __DIR__.'/utils/connection.php';
    $save = true;

    //Truncando a tabela posts.
    $conn->query('TRUNCATE posts');

    //Pegando o arquivo SQL.
    $sql = file_get_contents(__DIR__.'/insert_posts.sql');
    //Começando uma transação.
    $conn->begin_transaction();
    //Executando SQL
    $conn->query($sql);

    //Se $save for TRUE, comite. Se for FALSE, reverte.
    if ($save){
        $conn->commit();
    }else{
        $conn->rollback();
    }


    echo 'START SELECT'. PHP_EOL;

    //Executando Query.
    $result = $conn->query('SELECT * FROM posts');
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    foreach($posts as $post){
        echo PHP_EOL;
        echo $post['title']. PHP_EOL;
        echo $post['body']. PHP_EOL;
        echo PHP_EOL;
    }
    
    echo 'END SELECT'. PHP_EOL;