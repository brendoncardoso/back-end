<?php 
    try{
        $pdo = new PDO('mysql:dbname=devsnotes; host=localhost','root', '');
    }catch(Exception $e){
        echo "Error: ".$e->getMessage();
    }

    $array = [];
?>