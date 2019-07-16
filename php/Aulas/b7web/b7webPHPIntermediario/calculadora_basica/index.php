<?php

    if(isset($_GET['n1']) && !empty($_GET['n1']) && isset($_GET['n2']) && !empty($_GET['n2'])) {
        $n1 = addslashes($_GET['n1']);
        $n2 = addslashes($_GET['n2']);
        $op = addslashes($_GET['op']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercício Cálculadora</title>
</head>
<body>
    <form action="resultado.php" method="get">
        Valor 1:
        <input type="text" name="n1"><br><br>


        <select name="op" id="">
            <option value="" selected></option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br><br>

        Valor 2:
        <input type="text" name="n2"><br><br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>