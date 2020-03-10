<?php 
    session_start();
    include 'class/Db.class.php';
    include 'class/Usuarios.class.php'; 
    
    if(isset($_POST['email']) && !empty($_POST['email']) && 
            isset($_POST['senha']) && !empty($_POST['senha'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario->setLogin($email, $senha);
    }
?>

<form method="POST">
    Email:
    <input type="email" name="email"><br><br>
    
    Senha: 
    <input type="password" name="senha"><br><br>
    <input type="submit" value="Enviar">
</form>

