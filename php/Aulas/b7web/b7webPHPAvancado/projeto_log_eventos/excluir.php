<?php 
    require 'class/historico.class.php';
    $id = addslashes($_REQUEST['id']);
    if(isset($id) && !empty($id)){
        $obj_historico->deleteHistorico($id);
        echo "<h1>Usuário deletado com Sucesso! Clique <a href='index.php'>aqui</a> para voltar.</h1>"; exit;
    }else{
        header('location: index.php'); 
    }
?> 