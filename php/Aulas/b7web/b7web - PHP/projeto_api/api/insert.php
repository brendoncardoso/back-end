<?php
    require '../config.php';

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method == 'post'){
        $title = isset($_POST['title']) ? $_POST['title']: NULL;
        $body = isset($_POST['body']) ? $_POST['body']: NULL;

        if($title || $body){
            $sql = $pdo->prepare("INSERT INTO notes (title, body) VALUES (:title, :body)");
            $sql->bindValue(':title', $title);
            $sql->bindValue(':body', $body);
            $sql->execute();

            $id = $pdo->lastInsertId();
            $array['success'][] = [
                'id' => $id,
                'title' => $title, 
                'body' => $body
            ];
        }else{
            $array['error'] = 'Post não foi setado';
        }
    }else{
        $array['error'] = 'Method Errado';
    }
    require '../return.php';
?>