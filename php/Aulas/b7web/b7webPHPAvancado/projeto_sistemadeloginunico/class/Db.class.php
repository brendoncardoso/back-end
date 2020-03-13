<?php

    /* 
    * Description of Db
    * 
    * @author Brendon
    */

    try{
        $db = new PDO("mysql:dbname=projeto_sistemadeloginunico; host=localhost", "root", "");
    }catch(PDOException $e){
        echo "ERROR IN:". $e->getMessage();
    }


