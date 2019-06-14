<?php
$x = 4;

switch($x){
    case 1:
        echo 'O X é UM!';
        break;
    case 2:
        echo 'O X é DOIS!';
        break;
    case 3:
        echo 'O X é TRÊS!';
        break;
    case 4:
    case 5:
    case 6:
        echo 'O X é QUATRO, CINCO E SEIS.';
        break;
    default:
        echo 'Este número X não está disponível. :(';
    break;
}
?>
