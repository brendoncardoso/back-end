<?php

    $multinivel = new MultiNivel();
    
    /* 
    * Description of MultiLinguagem
    * 
    * @author Brendon
    */
    
    class MultiNivel {
        
        private $db; 
        private $user;
        private $users;
        private $rowCountUsers;
        
        
        /***********************************************
        *                                               *
        *                   Connection                  *
        *                                               *
        ************************************************/
        public function __construct(){
            $this->db = new PDO("mysql:dbname=projeto_multinivel;host=localhost", "root", "");
        }
        
        
         /***********************************************
        *                                               *
        *                     Login                     *
        *                                               *
        ************************************************/
        public function login($email, $senha){
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $fetch = $sql->fetch(PDO::FETCH_ASSOC);
                $_SESSION['logado'] = $fetch['id'];
                header('location: index.php');
            }
        }
        
        
        
         /***********************************************
        *                                               *
        *                  selectUser                   *
        *                                               *
        ************************************************/
        public function selectUser($id){
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $this->user = $sql->fetch(PDO::FETCH_ASSOC);
            }
        }
        
        public function getUser(){
            return $this->user;
        }
        
        
        
        /***********************************************
        *                                              *
        *                  selectUsers                 *
        *                                              *
        ***********************************************/
        public function selectUsers($id, $limite){
            $array = array();
            
            $sql = "SELECT * FROM usuarios WHERE id_pai = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            $this->rowCountUsers = $sql->rowCount();
            
            echo "<pre>";
            print_r($this->rowCountUsers);
            echo "</pre>";
            
            if($this->rowCountUsers > 0){
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach($array AS $chaves => $values){
                    if($limite > 0){
                        $array[$chaves]['filhos'] = array();
    //                    echo "<pre>";
    //                    print_r($this->selectUsers($values['id']));
    //                    echo "</pre>";
                        $array[$chaves]['filhos'] = $this->selectUsers($values['id'], $limite - 1);
                    }
                }
            }
            
            return $array;
        }
        
        public function getNumRowsUsers(){
            return $this->rowCountUsers;
        }
        
        
        /***********************************************
        *                                              *
        *                  insertUser                  *
        *                                              *
        ***********************************************/
        public function insertUser($id_pai, $email, $senha){
            
            $sql1 = "SELECT * FROM usuarios WHERE email = :email";
            $sql1 = $this->db->prepare($sql1);
            $sql1->bindValue(':email', $email);
            $sql1->execute();
            
            if($sql1->rowCount() == 0){
                $sql2 = "INSERT INTO usuarios (id_pai, patente, email, senha) VALUES (:id_pai, :patente, :email, :senha)";
                $sql2 = $this->db->prepare($sql2);
                $sql2->bindValue(':id_pai', $id_pai);
                $sql2->bindValue(':patente', 1);
                $sql2->bindValue(':email', $email);
                $sql2->bindValue(':senha', $senha);
                $sql2->execute();

                header('location: index.php');
            }
        }
    }

