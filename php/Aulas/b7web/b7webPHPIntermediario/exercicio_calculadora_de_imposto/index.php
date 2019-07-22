
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculando Imposto</title>
</head>
<body>
    <form action="" method="get">
        Valor do produto: <br/>
        <input type="text" name="val_produto"> <br/> <br/>

        Taxa de Imposto (em %): <br/>
        <input type="text" name="val_imposto"> <br/> <br/>
        
        <input type="submit" value="Calcular">


        <?php if(!empty($_GET['val_produto']) && !empty($_GET['val_imposto'])) { ?>
            <?php
                $val_produto = floatval(isset($_GET['val_produto']) ? $_GET['val_produto'] : '');
                $val_imposto = floatval(isset($_GET['val_imposto']) ? $_GET['val_imposto'] : '');
            ?>
            
            <hr>
            Valor do Produto: R$ <?php echo $val_produto; ?><br/>
            Taxa de Imposto: <?php echo $val_imposto; ?> %<br/>
            <hr>

            <?php
                $imposto = ($val_produto / $val_imposto);
                $produto = ($val_produto - $imposto);
            ?>

            Imposto: R$ <?php echo $imposto; ?><br/>
            Produto: R$ <?php echo $produto; ?><br/>
        <?php } else { ?>
            <script>
                header('location: index.php');
            </script>
        <?php } ?> 
    </form>
</body>
</html>