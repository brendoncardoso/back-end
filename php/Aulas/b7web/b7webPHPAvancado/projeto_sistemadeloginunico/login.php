<?php
    session_start();
    
    require 'class/Db.class.php';
    require 'class/Login.class.php';
    
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $login->setLogin($email, $senha);
        header('location: index.php');
    }
?>

<form method="POST">
    Email: <br>
    <input type="email" name="email"><br></br>
    
    Senha: <br>
    <input type="password" name="senha"><br></br>
    
    <input type="submit" value="Entrar">
</form>
  
