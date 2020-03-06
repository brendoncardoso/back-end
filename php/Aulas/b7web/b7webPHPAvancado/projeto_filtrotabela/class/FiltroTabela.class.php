<?php

    $obj_filtrotabela = new FiltroTabela();
    
    /* 
    * Description of FiltroTabela
    * 
    * @author Brendon
    */

    class FiltroTabela {
        
        private $db;
        private $genre;
        private $numrows;
        private $array;
        
        public function __construct() {
            $this->db = new PDO("mysql:dbname=projeto_filtrotabela; host=localhost", "root", "");
        }
        
        public function setSearchGenre($sexo){
            if(isset($_POST['sexo']) && $_POST['sexo'] != -1){
                $this->genre = intval($_POST['sexo']);
                $sql = "SELECT * FROM usuarios WHERE sexo = :sexo";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':sexo', $this->genre);
                $sql->execute();
                $this->numrows = $sql->rowCount();
                $this->array = $sql->fetch(PDO::FETCH_ASSOC);
            }else{
                $sql = "SELECT * FROM usuarios";
                $sql = $this->db->prepare($sql);
                $sql->execute();
                $this->numrows = $sql->rowCount();
                $this->array = $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        
        public function getArray(){
            return $this->array;
        }
        
        public function getNumRows(){
            return $this->numrows;
        }
    }
     
