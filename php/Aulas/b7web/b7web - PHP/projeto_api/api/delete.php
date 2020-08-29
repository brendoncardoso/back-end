<?php
    require '../config.php';

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method == 'delete'){
        parse_str(file_get_contents('php://input'), $input);
        $id = isset($input['id']) && !empty($input['id']) ? $input['id'] : NULL;

        if($id){
            $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
            $sql->bindValue('id', $id);
            $sql->execute();
            if($sql->rowCount()){
                if($id){
                    $sql = $pdo->prepare("DELETE FROM notes WHERE id = :id");
                    $sql->bindValue(':id', $id);
                    $sql->execute();

                    $array['success'] = "ID $id excluido com sucesso";
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