<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo 'Formulário Enviado pelo '. $_POST['nome'];
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
    <form action="exemplo-1.php" method="post">
        <input type="text" name="nome">
        <input type="submit" value="enviar">
    </form>
    <a href="">Nome</a>
    <p>O <?php echo $_GET['nome']; ?> clicou no link acima.</p>
</body>
</html>