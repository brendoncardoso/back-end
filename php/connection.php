<?php

    //Incluindo a Configuração
    include 'config.php';

    //Conectando ao Banco de Dados
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $conn;

    //Verificando conexão ao Banco de Dados
    if($conn->connect_errno){
        die('Houve uma Falha: ('.$conn->connect_errno.')'.$conn->connect_error);
    }else{
        echo 'Conectado!';
    }