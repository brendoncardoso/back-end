<?php
    require 'config.php';
        $sql = "SELECT * FROM usuarios WHERE status = 1";
        $sql = $pdo->query($sql);
    ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Área Restrita</title>
</head>
<body>
    <h1>Atenção, área restrita!</h1>

    <br>

    <?php foreach($sql as $usuario) { ?>
        Usuário: <?php echo $usuario['email'];?>
    <?php } ?>
    
</body>
</html>