<?php

    $login = new Login($db);
    
    /* 
    * Description of Login
    * 
    * @author Brendon
    */

    class Login {
        
        private $db;
        private $numrowssession;
        
        public function __construct($db){
            $this->db = $db;
        }
        
        public function setLogin($email, $senha){
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $fetch = $sql->fetch(PDO::FETCH_ASSOC);
                $ip = $_SERVER['REMOTE_ADDR'];
                $id = $fetch['id'];
                $_SESSION['login'] = $id;
                
                $sql = "UPDATE usuarios SET ip = :ip WHERE id = :id";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':ip', $ip);
                $sql->bindValue(':id', $id);
                $sql->execute();
            }
        }
        
        
        public function setLoginSession($id){
            $ip = $_SERVER['REMOTE_ADDR'];
            $sql = "SELECT * FROM usuarios WHERE id = :id AND ip = :ip";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->bindValue(':ip', $ip);
            $sql->execute(); 
            $this->numrowssession = $sql->rowCount();
        }
        
        public function getNumRowsSession(){
            return $this->numrowssession;
        }
        
    }

