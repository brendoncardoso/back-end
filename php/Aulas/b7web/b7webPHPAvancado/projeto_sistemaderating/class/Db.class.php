<?php

    try{
        $db = new PDO("mysql:dbname=projeto_sistemaderating; host=localhost;", "root", "");
    }catch(PDOException $e){
        echo "ERROR IN:". $e->getMessage();
    }
