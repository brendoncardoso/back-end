
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reverter String</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="string">
        <input type="submit" value="Enviar">
        <?php if(!empty($_POST['string'])){ ?>
            <?php
                $string = $_POST['string'];
                
                echo '<br/>'.$string.'<br/>';
                echo strrev($string);
            ?>
        <?php } ?>
    </form>
</body>
</html>