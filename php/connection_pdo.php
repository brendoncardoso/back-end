<?php
    try{
        $pdo = new PDO("mysql:dbname=b7web;host=localhost", 'root', '');
    }catch(Exception $e){
        echo "ERROR IN: ".$e->getMessage();
    }
?>