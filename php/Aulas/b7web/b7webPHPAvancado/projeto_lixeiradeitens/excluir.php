<?php
    include 'class/Lixeira.class.php';
    
    if(!empty($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        
        $lixeira->excluirUsuario($id);
        header('location: index.php');
    }
?>