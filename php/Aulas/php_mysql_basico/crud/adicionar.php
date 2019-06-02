<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email']? $_POST['email']: NULL;
        $conn = require('connection.php');
        $stmt = $conn->prepare('INSERT INTO users (email) VALUE (?)');
        $stmt-> bind_param('s', $email);
        $stmt-> execute();
        header('location: index.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar</title>
</head>
<body>
    <h1>Adicionar usuário</h1>
    <form action="" method="POST">
        <input type="email" name="email">
        <input type="submit" value="Enviar">
    </form>

    <p><a href="index.php">Voltar</a></p>
</body>
</html>
