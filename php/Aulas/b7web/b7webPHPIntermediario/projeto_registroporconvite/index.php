<?php

    require 'config.php';
    
    if(isset($_POST['enviar_form_index'])){
        $email = $_POST['email'];

        $sql = mysql_query("SELECT * FROM usuarios WHERE email = '$email'");

        $num_row = mysql_num_rows($sql);
        var_dump($num_row); exit;
        
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<body>
    <form action="" method="post">
        Email:
        <input type="email" name="email"/><br><br>

        Senha:
        <input type="password" name="senha" id=""/><br><br>

        <input type="submit" value="Entrar" name="enviar_form_index">
        <a href="cadastrar.php">Registrar</a>
    </form>
</body>
</body>
</html>