<?php
    $arquivo = $_FILES['arquivo'];
    print_r($arquivo);
    
    //if(isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false){
        //$nomedoarquivo = md5(time().rand(0, 99)).'.pdf';
       // move_uploaded_file($arquivo['tmp_name'], 'arquivos/'.$arquivo['name']);
        //echo "Arquivo enviado com sucesso!";
    //}
?>

<h1>Formulário Enviado com sucesso!!</h1>