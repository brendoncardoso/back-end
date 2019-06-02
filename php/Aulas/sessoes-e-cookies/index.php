<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <?php
        require __DIR__.'/session.php';
        $user = $_SESSION['user']? $_SESSION['user']: null;
        if(!$user){
            header('location: login.php');
            exit;
        }
    ?>
    <h1>Página Protegida!</h1>
    <p>Olá, <?php echo $user['email']?>!:)</p>
</body>
</html>
