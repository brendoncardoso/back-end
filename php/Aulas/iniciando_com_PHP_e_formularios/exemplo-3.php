<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //$idade = (isset($_POST['idade']))?$_POST['idade']: NULL;
        $idade = $_POST['idade']? $_POST['idade']: NULL;
        if(is_null($idade) || $idade === ''){
            die('Você não informou a idade.');
        }
        $idade = (int)$idade;
        if($idade < 18){
            die ('Você é muito jovem para essa determinado script.');
        }
        $idade_string = (string)$idade;
        echo '<pre>';
        var_dump ($idade_string, $idade);
        echo 'Ok, a sua idade é de '.$idade;
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
        <form action="exemplo-3.php" method="post">
            <input type="text" name="idade" placeholder="idade">
            <input type="submit" value="enviar">
        </form>
    </body>
</html>
