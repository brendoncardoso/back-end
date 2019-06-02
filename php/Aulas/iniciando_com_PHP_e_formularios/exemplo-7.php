<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //Extract
        extract($_POST);
        echo '<pre>';
        var_dump($nome, $idade);
        echo '</pre>';

        //Compact
        $data = compact('nome','idade');
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        
        exit;
    }
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
    <form action="exemplo-7.php" method="post">
        <input type="text" name="nome">
        <input type="text" name="idade">
        <input type="submit" value="enviar">
    </form>
</body>
</html>