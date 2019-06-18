<?php
    $arquivo = $_FILES['arquivo'];

    if(isset($_FILES['arquivo']) && empty($_FILES['arquivo']) == false) {
        if(count($_FILES['arquivo']['tmp_name']) > 0){
            for($q = 0; $q < count($_FILES['arquivo']['tmp_name']); $q++){
                $nomedoarquivo = md5($_FILES['arquivo']['name'][$q] . time(). rand(0,999)).'.png';
                move_uploaded_file($_FILES['arquivo']['tmp_name'][$q], 'arquivos/'. $nomedoarquivo);

                echo 'Arquivos enviados com sucesso!';
            }
        } 
    }
?>