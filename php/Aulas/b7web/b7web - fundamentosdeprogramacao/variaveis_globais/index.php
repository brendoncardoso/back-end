<?php
/*
    echo '<pre>';
    print_r($_SERVER);
    echo '</pre>';
*/
?>

<?php 
    //Método GET
    $nome = $_GET['nome'];
    $sobrenome = $_GET['sobrenome'];

    echo "Seu nome completo é: ".$nome." ".$sobrenome.".";
?>


