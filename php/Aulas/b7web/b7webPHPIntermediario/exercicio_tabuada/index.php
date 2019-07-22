<?php
    $numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabuada</title>
</head>
<body>

    <h1>EXERCÍCIO DE TABUADA</h1>
    <table border="1">
        <?php foreach($numeros as $tabuada) { ?>
            <tr style="text-align: center;">
                <th><?php echo $tabuada; ?></th>
                <?php for($x = 1; $x <= 10; $x++) { ?>
                    <td><?php echo $tabuada * $x; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>