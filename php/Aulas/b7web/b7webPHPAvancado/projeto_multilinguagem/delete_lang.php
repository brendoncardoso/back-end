<?php
    require 'include/header.php';
    include_once 'class/Lang.class.php';
    
    $id_linguagem = addslashes($_REQUEST['id_linguagem']);
    if(isset($id_linguagem) && !empty($id_linguagem)){
        $obj_lang->deleteLang($id_linguagem);
        header('location: view_lang.php');
    }
?>

