<?php
    $lista = file('lista.txt');

    echo 'O sorteado foi: '.$lista[rand(0, 4)];
?>