<?php
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = $_POST['nome'];
        file_put_contents("nomes.txt", $nome, FILE_APPEND);
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto: Anti F5</title>
</head>
<body>
    <form action="" method="POST">
        Nome:<br/>
        <input type="text" name="nome"><br>
        <input type="Submit" value="Enviar Nome">
    </form>
</body>
</html>