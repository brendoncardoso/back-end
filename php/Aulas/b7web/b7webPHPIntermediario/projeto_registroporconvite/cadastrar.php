<?php
    require 'config.php';

    if(!empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = md5($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql = $pdo->query($sql);

        if($sql->rowCount() <= 0){
            $sql = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha');";
            $sql = $pdo->query($sql);

            header('location: index.php'); 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página de Login</title>

</head>
<body>
    <form action="" method="post">
        Email:
        <input type="email" name="email"/><br><br>

        Senha:
        <input type="password" name="senha"/><br><br>

        <input type="submit" value="Cadastrar"/>
        <a href="index.php" type="submit" value="Cadastrar">Sair</a>
    </form>
</body>
</html>