<?php
    $arquivo = $_FILES['arquivo'];
    echo '<pre>';
    print_r($arquivo);
    echo '</pre>';

    if(isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false){
        $nomedoarquivo = md5(time(). rand(0,99)).'.pdf';
        move_uploaded_file($arquivo['tmp_name'], 'arquivos/'.$nomedoarquivo);

        echo 'Arquivo Enviado com sucesso!';
    }
?>