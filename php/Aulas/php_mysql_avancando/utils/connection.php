<?php

    //Fazendo include com connection.php
    include 'config.php';
    
    //Manipulando erros com debug
    $debug = true;
    if($debug){
        mysqli_report(MYSQLI_REPORT_ERROR);
    }
    
    //Fazendo conexão com Banco de Dados
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $conn;
    
    /*if($conn->connect_errno){
        die('Houve uma Falha em: ('.$conn->connect_errno.')' .$conn->connect_error);
    };*/
