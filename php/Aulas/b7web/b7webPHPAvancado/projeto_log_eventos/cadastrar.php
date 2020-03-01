<?php
    require 'class/historico.class.php';
    
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = addslashes($_POST['email']);
        $obj_historico->insertHistorico($email);
    }
?>

<form method="POST">
    Email: <br>
    <input type="email" name="email">
    <br>
    <br>
    <input type="submit" value="Enviar">
    <br>
    <br>
    <a href="index.php">Voltar</a>
</form>