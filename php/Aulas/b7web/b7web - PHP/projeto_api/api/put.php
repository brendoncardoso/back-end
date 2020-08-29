<?php
    require '../config.php';

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method == 'put'){
        parse_str(file_get_contents('php://input'), $input);
        $id = isset($input['id']) && !empty($input['id']) ? $input['id'] : NULL;
        $title = !empty($input['title']) ? $input['title'] : '';
        $body = !empty($input['body']) ? $input['body'] : '';

        if($id){
            $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
            $sql->bindValue('id', $id);
            $sql->execute();
            if($sql->rowCount()){
                if($id && $title && $body){
                    $sql = $pdo->prepare("UPDATE notes SET title = :title, body = :body WHERE id = :id");
                    $sql->bindValue(':id', $id);
                    $sql->bindValue(':title', $title);
                    $sql->bindValue(':body', $body);
                    $sql->execute();
        
                    $array['success'][] = [
                        'id' => $id,
                        'title' => $title, 
                        'body' => $body
                    ];
                }else{
                    $array['error'] = 'Inputs não foram setados';
                }
            }else{
                $array['error'] = 'ID não existe';
            }
        }else{
            $array['error'] = 'ID não foi setado';
        }
    }else{
        $array['error'] = 'Method Errado';
    }
    require '../return.php';
?>