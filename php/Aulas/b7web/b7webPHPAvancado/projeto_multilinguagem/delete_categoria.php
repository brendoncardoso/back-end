<?php
    require 'include/header.php';
    include_once 'class/Categoria.class.php';
    
    $id = addslashes($_REQUEST['id']);
    if(isset($id) && !empty($id)){
        $obj_categoria ->deleteCategoria($id);
        header('location: view_categoria.php');
    }
?>
