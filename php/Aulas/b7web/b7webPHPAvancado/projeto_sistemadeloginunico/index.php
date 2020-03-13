<?php
    session_start();
    
    require 'class/Db.class.php';
    require 'class/Login.class.php';
    
    if(!isset($_SESSION['login'])){
        header('location: login.php');
    }else{
        $login->setLoginSession($_SESSION['login']);
        if($login->getNumRowsSession() == 0){
            header('location: login.php');
        }
    }
?>

<h1>Área Restrita</h1>
