<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transformar palavra em Dígito</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="numeroEscolher">
        <input type="submit" value="Enviar">

        <?php if(!empty($_GET['numeroEscolher'])) { ?>
            <?php
                $numeroEscolher = addslashes($_GET['numeroEscolher']);
                $textos = explode(',', $numeroEscolher);
                
                $numero = array();

                foreach($textos as $texto){
                    switch($texto){
                        case 'um':
                            array_push($numero, '1');
                            break;
                        case 'dois':
                            array_push($numero, '2');
                            break;
                        case 'quatro':
                            array_push($numero, '4');
                            break;
                        case 'cinco':
                            array_push($numero, '5');
                            break;
                        case 'seis':
                            array_push($numero, '6');
                            break;
                        case 'sete':
                            array_push($numero, '7');
                            break;
                        case 'oito':
                            array_push($numero, '8');
                            break;
                        case 'nove':
                            array_push($numero, '9');
                            break;
                        case 'três' || 'tres':
                            array_push($numero, '3');
                            break;
                        default;
                    }

                    $numeroTransformado = implode(',', $numero);
                }
            ?>
            <br>
            <br>
            <strong>Numero Escolhido: </strong><?php echo $numeroEscolher; ?> <br>
            <strong>Número Transformado: </strong><?php echo $numeroTransformado; ?>
        <?php } ?>
    </form>
</body>
</html>