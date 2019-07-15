<?php
    $n1 = $_GET['n1'];
    $n2 = $_GET['n2'];
    $op = $_GET['op'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultado</title>
</head>
<body>
    <p><?php echo $_GET['n1']?> <?php echo $_GET['op']; ?> <?php echo $_GET['n2']?> = <?php echo $op?></p>
</body>
</html>