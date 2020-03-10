<?php   
    session_start();
    include 'class/Captcha.class.php';

    if(!isset($_SESSION['captcha'])){
        header('location: captcha.php');
    }
?>

<h1>Página Restrita</h1>