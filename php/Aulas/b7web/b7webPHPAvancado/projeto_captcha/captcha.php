<?php
    session_start();
    include 'class/Captcha.class.php';    
    
    if(!isset($_SESSION['captcha'])){
        $rand = rand(1000, 9999);
        $_SESSION['captcha'] = $rand;    
    }
        
    if(isset($_POST['codigo']) && !empty($_POST['codigo'])){
        $codigo = $_POST['codigo'];
        $captcha->verificaCaptcha($codigo);
    }
?>

<img src="imagem.php" width="100" height="50"> <br><br>

<form method="POST">
    <input type="text" name="codigo">
    <input type="submit" value="Enviar">
</form>

