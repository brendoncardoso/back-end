<?php

    $carro = new Carro($db);
    $arrayCarro = $carro->getCarro(); 
    
    /* 
    * Description of Carro
    * 
    * @author Brendon
    */

    class Carro {
        
        private $db;
        private $numrows;
        
        public function __construct($db){
            $this->db = $db;
        }
        
        
        public function getCarro(){
            $array = array();
            
            $sql = "SELECT * FROM carro";
            $sql = $this->db->query($sql);
            $sql->execute();
            $this->numrows = $sql->rowCount();
            
            if($this->numrows > 0){
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            }
            
            return $array;
        }
        
        public function getNumRowsCarro(){
            return $this->numrows;
        }
    }
