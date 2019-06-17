<?php
    $senha = "Brendon";
    $senha2 = md5($senha);
    echo 'Senha original é: '.$senha.'</br>';
    //echo 'Senha da criptografia é: '.$senha2;

    $codigo = "QnJlbmRvbg==";
    echo 'Senha da Captografia é: '.base64_decode($codigo).'</br>';
?>