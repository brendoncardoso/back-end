<?php 
    session_start();

    global $pdo;
    
    try{
        $pdo = new PDO("mysql:dbname=classificados; host=localhost", "root", "");
    }catch(Exception $e){
        echo "Error in: ".$e->getMessage();
    }
?>