<?php
    $conn = require __DIR__.'/utils/connection.php';

    $save = true;

    $conn->query('TRUNCATE comments');

    $sql = file_get_contents(__DIR__.'/insert_comments.sql');

    $conn->begin_transaction();
    $conn->query($sql);
    
    if($save){
        $conn->commit();
    }else{
        $conn->rollback();
    }
    
    echo 'START SELECT'. PHP_EOL;
    $result = $conn->query('SELECT * FROM comments');
    $comments = $result->fetch_all(MYSQLI_ASSOC);
    foreach($comments as $comment){
        echo PHP_EOL;
        echo $comment['email']. PHP_EOL;
        echo $comment['comment']. PHP_EOL;
        echo $comment['post_id']. PHP_EOL;
        echo PHP_EOL;
    }
    echo 'END SELECT'. PHP_EOL;