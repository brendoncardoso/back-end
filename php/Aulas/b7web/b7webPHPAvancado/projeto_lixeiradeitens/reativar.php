<?php
    include 'class/Lixeira.class.php';
    
    if(!empty($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        
        $lixeira->reativarUsuario($id);
        header('location: index.php');
    }
?>

