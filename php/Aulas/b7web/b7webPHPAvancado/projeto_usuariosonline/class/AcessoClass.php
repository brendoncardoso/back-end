<?php

    $acesso = new Acesso();
    /* 
     * Description of AcessoClass
     * 
     * @author Brendon
     */

    class Acesso {
        private $db;
        private $online;
        
        public function __construct() {
            $this->db = new PDO("mysql:dbname=projeto_usuariosonline; host=localhost", "root", "");
        }
        
        public function insertUser($ip, $hora){
            $sql = "INSERT INTO acesso (ip, hora) VALUES (:ip, :hora)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':ip', $ip);
            $sql->bindValue(':hora', $hora);
            $sql->execute();           
        }
        
        public function deleteUser($hora){
            $sql = "DELETE FROM acesso WHERE hora < :hora";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':hora', date('Y-m-d H:i:s', strtotime('-2 minutes')));
            $sql->execute();
        }
        
        public function selectUsers($hora){
            $sql = "SELECT * FROM acesso WHERE hora > :hora GROUP BY ip";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':hora', date('H:i:s', strtotime('-2 minutes')));
            $sql->execute();
            $this->online = $sql->rowCount();           
        } 
        
        public function usersOnline(){
            return $this->online;
        }
        
        
    }

