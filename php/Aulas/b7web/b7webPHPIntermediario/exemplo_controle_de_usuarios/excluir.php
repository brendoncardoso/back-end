<?php
    require 'config.php';

    $id = 0;

    if(isset($_GET['id']) && empty($_GET['id']) == false){
        $id = addslashes($_GET['id']);
        $sql = "DELETE FROM usuarios WHERE id= '$id'";
        $pdo->query($sql);
        header("location: index.php");
    }
?>
