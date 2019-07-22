<?php
    $nome = isset($_GET['nome']) ? $_GET['nome'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercício para dizer Oi</title>
</head>
<body>
    <form action="" method="get">
        Seu nome:
        <input type="text" name="nome">
        <input type="submit" value="Enviar">
        
        
        <?php if (!empty($_GET['nome'])) { ?>
            <p>Seja bem-vindo(a), <?php echo $nome?>!</p>
        <?php } else { ?>
            
        <?php } ?>
    </form>
</body>
<script>
    
</script>
</html>