<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=projeto_esquecisenha", "root", "");
    }catch(PDOException $e){
        echo "ERROR IN: ".$e->getMessage();
    }

