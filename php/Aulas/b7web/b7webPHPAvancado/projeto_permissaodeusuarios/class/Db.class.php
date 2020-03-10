<?php

    /* 
    * Description of Db.class
    * 
    * @author Brendon
    */

    try{
        $db = new PDO("mysql:dbname=projeto_permissaodeusuarios; host=localhost", "root", "");
    }catch(PDOException $e){
        echo "ERROR IN: ". $e->getMessage();
    }
?>