<?php
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
        echo "Campo de Email preenchido. E o Email preenchido foi: ".$email.".".PHP_EOL;
    }                                                                                            
?>