<?php 
    require '../config.php';


    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method == "get"){
        $sql = $pdo->query("SELECT * FROM notes");
        $sql->execute();

        if($sql->rowCount()){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($data as $row){
                $array['success'][] = [
                    "id" => $row['id'],
                    "title" => $row['title']
                ];
            }
            
        }else{
            $array['success'] = "Nenhum registro encontrado";
        }
    }else{
        $array['error'] = "ERROR";
    }


    require '../return.php';
?>