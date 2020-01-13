<?php
    require '../../../../connection_pdo.php';
    $id = $_GET['h'];
    
    if(!empty($id)){
        $sql = "UPDATE usuarios SET status = 1 WHERE MD5(id)= ".$md5;
        $sql = $pdo->query($sql);
        $sql->execute();

        echo "Cadastro confirmado com Sucesso!";
    }

?>