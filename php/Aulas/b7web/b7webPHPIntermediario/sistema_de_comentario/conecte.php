<?php
    include 'configuration.php';
    $debug = true;

    if($debug){
        mysqli_report(MYSQLI_REPORT_ERROR);
    }

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $conn;
    
    if ($conn->connect_errno) {
        echo "Falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;
    };
   
?>