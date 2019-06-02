<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = filter_input(INPUT_POST,'nome', FILTER_VALIDATE_EMAIL);
        $idade = filter_input(INPUT_POST,'idade', FILTER_SANITIZE_NUMBER_INT);
        
        echo '<pre>';
        var_dump($nome);
        echo '</pre>';

        echo '<pre>';
        var_dump($idade);        
        echo '</pre>';


        $data = filter_input_array(INPUT_POST);
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
    <form action="exemplo-5.php" method="post">
        <input type="text" name="nome">
        <input type="text" name="idade">
        <input type="submit" value="enviar">
    </form>
</body>
</html>