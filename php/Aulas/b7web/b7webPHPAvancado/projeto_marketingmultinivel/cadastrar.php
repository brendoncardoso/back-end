<?php
    session_start();
    include ('class/MultiNivelClass.php');
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
        $senha = md5($_POST['email']);
        
        $multinivel->insertUser($_SESSION['logado'], $email, $senha);
    }
?>

<form method="POST">
    Email: </br>
    <input type="email" name="email"></br></br>
    
    <input type="submit" value="Cadastrar">
</form>

<br>
<a href="index.php" >Voltar</a>

