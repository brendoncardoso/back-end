<?php
    session_start();
    include ('class/MultiNivelClass.php');
    if(isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['senha']) && !empty($_POST['senha'])){
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        
        $multinivel->login($email, $senha);
    }
?>

<form method="POST">
    Email: </br>
    <input type="email" name="email"></br></br>
    
    Senha: </br>
    <input type="password" name="senha"></br></br>
    
    <input type="submit" value="Enviar">
</form>

