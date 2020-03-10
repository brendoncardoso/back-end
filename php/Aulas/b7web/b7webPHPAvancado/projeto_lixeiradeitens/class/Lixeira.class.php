<?php

    $lixeira = new Lixeira();
    /* 
     * Description of Lixeira
     * 
     * @author Brendon
     */


    class Lixeira {
        
        private $db;
        private $array;
        
        public function __construct() {
            $this->db = new PDO("mysql:dbname=projeto_lixeiradeitens; host=localhost", "root", "");
        }
        
        public function lixeira(){
            $sql = "SELECT * FROM usuarios";
            $sql = $this->db->query($sql);
            $sql->execute();
            $rowCount = $sql->rowCount(); 
            $this->array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getLixeira(){
            return $this->array;
        }
        
        public function excluirUsuario($id){
            $sql = "UPDATE usuarios SET status = 0 WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }
        
        public function reativarUsuario($id){
            $sql = "UPDATE usuarios SET status = 1 WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }
    }

