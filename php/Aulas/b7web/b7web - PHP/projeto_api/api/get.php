<?php
    require '../config.php';

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method == 'get'){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
        
            $sql = $pdo->query("SELECT * FROM notes WHERE id = ".$_GET['id']);
            $sql->execute();
            if($sql->rowCount()){
                $dados = $sql->fetch(PDO::FETCH_ASSOC);
                $array['success'][] = [
                    'id' => $dados['id'],
                    'title' => $dados['title']
                ];
            }else{
                $array['error'] = 'ID não foi encontrado';
            }
        }else{
            $array['error'] = 'ID não foi setado';
        }
    }else{
        $array['error'] = 'Method Errado';
    }
    require '../return.php';
?>