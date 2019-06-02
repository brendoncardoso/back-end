<?php
    include 'config.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    return $conn;
    /*if($conn->connect_errno){
        die ('Houve uma falha em: ('.$conn->connect_errno.')' .$conn->connect_error);
    };*/
?>