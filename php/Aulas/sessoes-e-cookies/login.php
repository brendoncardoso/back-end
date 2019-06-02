<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php
        require __DIR__.'/session.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_SESSION['user'] = [
                'email'=> filter_input(INPUT_POST, 'email')
            ];
            header('location: index.php');
            exit;
        };
    ?>
    <h1>Formulário de Login</h1>
    <hr>
    <form action="" method="post">
        <h1>Login:</h1>
        <input type="email" name="email" id="">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
