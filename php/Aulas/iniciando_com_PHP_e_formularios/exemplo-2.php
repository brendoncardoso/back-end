<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo '<pre>';
            var_dump($_POST);
            var_dump($_FILES);
        echo '</pre>';
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
    <form action="exemplo-2.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nome">
        <input type="email" name="email">
        <input type="color" name="color">
        <input type="date" name="date">
        <input type="datetime" name="datetime">
        <input type="file" name="file">
        <input type="number" name="number">
        <br>
        <input type="radio" name="radio" value="valor 1" id="">
        <input type="radio" name="radio" value="valor 2" id="">
        <input type="radio" name="radio" value="valor 3" id="">
        <br>
        <input type="checkbox" name="checkbox" value="checkbox" id="">
        <input type="submit" value="enviar">
    </form>
</body>
</html>