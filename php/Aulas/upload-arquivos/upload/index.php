<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Arquivos</title>
</head>
<body>
<?php
    if(isset($_POST['enviar-formulario'])):
        //FORMATOS PERMITIDOS, QUATIDADE DE ARQUIVOS, CONTADOR E EXTENSÃO
        $formatosPermitidos = array("jpg","png","jpeg","gif");
        $quantidadeArquivos = count($_FILES['arquivos']['name']);
        $contador = 0;

        //WHILE
        while ($contador < $quantidadeArquivos):
            $extensao = pathinfo($_FILES['arquivos']['name'][$contador], PATHINFO_EXTENSION);
            //IN_ARRAY
            if(in_array($extensao, $formatosPermitidos)):
                $pasta = "arquivos/";
                $temporario = $_FILES['arquivos']['tmp_name'][$contador];
                $novoNome = uniqid().".$extensao";

                //MOVE_UPLOADED_FILE
                if(move_uploaded_file($temporario, $pasta.$novoNome)):
                    echo "Upload feito com sucesso para: <b>$pasta$novoNome</b>.<br>";
                else:
                    echo "Erro ao Enviar arquivo $temporario";
                endif;
            else: 
                echo "O arquivo .$extensao não é permito.<br>";    
            endif;
        $contador++;
        endwhile;
    endif;
?>      
</body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="arquivos[]" multiple><br>
        <input type="submit" name="enviar-formulario">
    </form>
</html>