<?php
    session_start();

    $n1 = rand(0, 10);
    $n2 = rand(0, 10);

    $_SESSION['v'] = $n1 + $n2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="verificar.php" method="post">
        <?php echo $n1; ?> + <?php echo $n2; ?> = 
        <input type="text" name="n">
        <input type="submit" value="Verificar">
    </form>
</body>
</html>