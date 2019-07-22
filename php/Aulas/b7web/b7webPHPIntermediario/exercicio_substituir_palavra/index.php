
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Substituir Palavra</title>
</head>
<body>
<form method="POST">
	Frase: <br>
	<input type="text" name="frase"><br><br>

	Procurar por: <br>
	<input type="text" name="procurar"><br><br>

	Trocar por: <br>
	<input type="text" name="trocar"><br><br>
    
	<input type="submit" value="Substituir">
</form>
<hr>
    <?php
        if (!empty($_POST['frase'])) {
            
        $frase = strtolower($_POST['frase']);
        $procurar = strtolower($_POST['procurar']);
        $trocar = strtolower($_POST['trocar']);

        $novaFrase = str_replace($procurar, $trocar, $frase);

        echo "Frase Original: ".$frase."<br/>";
        echo "Frase Modificada: ".$novaFrase;
        }
    ?>
</body>
</html>