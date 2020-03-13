<?php
    require 'class/Db.class.php';
    require 'class/Filmes.class.php';
    
    if(isset($_REQUEST['id']) && !empty($_REQUEST['id']) &&
            isset($_REQUEST['nota']) && !empty($_REQUEST['nota'])){
        $id = $_REQUEST['id'];
        $nota = $_REQUEST['nota'];
        $filmes->insertVoto($id, $nota);
        header('location: index.php');
    }
    
?>



