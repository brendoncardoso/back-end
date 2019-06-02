<?php
    if(isset($_POST['email']) && !empty($_POST['email'])){
        if(isset($_POST['senha']) && !empty($_POST['senha'])){
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            echo "Sucesso! Foi preenchido corretamente. Seu email é: ".$email." e a senha que você colocou foi: ".$senha.".";
        }
    }
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recebendo Formulário: </title>
</head>
<body>
    <form action="" method="post">
        Email:<br/>
        <input type="email" name="email"><br>
        Senha:<br/>
        <input type="password" name="senha"><br><br>
        
        <input type="submit" name="Enviar Formulário">
    </form>
</body>
</html>