<?php
    $obj_categoria = new Categoria();
    
    $arraySelectAll = $obj_categoria -> selectAllCategoria();
    $num_rows_selectAll = $obj_categoria->getAllNumRowsCategoria();
    
    class Categoria {
        
        private $db;
        private $selectAllCateriaRow;
        
        public function __construct() {
            $this->db = new PDO("mysql:dbname=projeto_multilinguagem; host=localhost;", "root", "");
        }
        
        public function selectAllCategoria(){
            $sql = "SELECT * FROM categoria";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            $this->selectAllCateriaRow = $sql->rowCount();
            $arraySelectAll = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            return $arraySelectAll;
        }
        
        public function getAllNumRowsCategoria(){
            return $this->selectAllCateriaRow;
        }
        
        public function insertCategoria($palavra){
            $sql = "SELECT palavra FROM categoria";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            $sql_select_palavra_rowCount = $sql->rowCount();
            
            if($sql_select_palavra_rowCount == 0){
                $sql = "INSERT INTO categoria (palavra) VALUES (:palavra)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':palavra', $palavra);
                $sql->execute();
            }
        }
        
        public function updateCategoria($palavra, $id){
            $sql = "SELECT palavra FROM categoria WHERE palavra = :palavra";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':palavra', $palavra);
            $sql->execute();
            $sql_select_palavra_id_rowCount = $sql->rowCount();
            
            if($sql_select_palavra_id_rowCount == 0){
                $sql = "UPDATE categoria SET palavra = :palavra WHERE id = :id";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':palavra', $palavra);
                $sql->bindValue(':id', $id);
                $sql->execute();
            }
        }
        
        public function selectCategoria($id){
            $sql = "SELECT * FROM categoria WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            $arraySelect = $sql->fetch(PDO::FETCH_ASSOC);
            
            return $arraySelect;
        }
        
        public function deleteCategoria($id){
            $sql = "DELETE FROM categoria WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }
    }
