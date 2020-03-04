<?php

    $obj_lang = new Lang();
    $arraySelectAll = $obj_lang->selectAllLang();
    $getNumRows = $obj_lang->getNumRows();
    
    class Lang {
        
        private $db;
        private $numRows;
        
        public function __construct() {
            $this->db = new PDO("mysql:dbname=projeto_multilinguagem; host=localhost;", "root", "");
        }
        
        public function selectAllLang(){
            $sql = "SELECT * FROM linguagem";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            $this->numRows = $sql->rowCount();
            $arraySelectAll = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            return $arraySelectAll;
        }
        
        public function selectLang($id_linguagem){
            $sql = "SELECT * FROM linguagem WHERE id_linguagem = :id_linguagem";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_linguagem', $id_linguagem);
            $sql->execute();
            $arraySelect = $sql->fetch(PDO::FETCH_ASSOC);
            
            return $arraySelect;
        }
        
        public function insertLang($nome_linguagem){
            $sql = "SELECT * FROM linguagem WHERE nome_linguagem = :nome_linguagem";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':nome_linguagem', $nome_linguagem);
            $sql->execute();
            $this->numRows = $sql->rowCount();
            
            if($this->numRows == 0){
                $sql = "INSERT INTO linguagem (nome_linguagem) VALUES (:nome_linguagem)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':nome_linguagem', $nome_linguagem);
                $sql->execute();
            }
        }
        
        public function updateLang($id_linguagem, $nome_linguagem){
            $sql = "SELECT * FROM linguagem WHERE nome_linguagem = :nome_linguagem";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':nome_linguagem', $nome_linguagem);
            $sql->execute();
            $this->numRows = $sql->rowCount();
            
            if($this->numRows == 0){
                $sql = "UPDATE linguagem SET nome_linguagem = :nome_linguagem WHERE id_linguagem = :id_linguagem";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':id_linguagem', $id_linguagem);
                $sql->bindValue(':nome_linguagem', $nome_linguagem);
                $sql->execute();
            }
        }
        
        public function deleteLang($id_linguagem){
            $sql = "DELETE FROM linguagem WHERE id_linguagem = :id_linguagem";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_linguagem', $id_linguagem);
            $sql->execute();
        }
        
        public function getNumRows(){
            return $this->numRows;
        }
    }