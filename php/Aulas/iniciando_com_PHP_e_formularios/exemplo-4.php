<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome']?$_POST['nome']: NULL;
        $nome = trim($nome);
        $nome = stripslashes($nome);
        $nome = htmlspecialchars($nome, ENT_NOQUOTES);
        echo $nome;
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
    <form action="exemplo-4.php" method="post">
        <input type="text" name="nome">
        <input type="submit" value="enviar">
    </form>
</body>
</html>