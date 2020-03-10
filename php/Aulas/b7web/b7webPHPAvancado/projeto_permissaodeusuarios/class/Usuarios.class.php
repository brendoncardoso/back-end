<?php    
    $usuario = new Usuarios($db);
    /* 
    * Description of Usuarios.class
    * 
    * @author Brendon
    */
    class Usuarios {
        private $db; 
        private $id; 
        private $permissoes;
        
        public function __construct($db) {
            $this->db = $db;
        }
        
        public function setLogin($email, $senha){
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();
            $rowCount = $sql->rowCount();
            
            if($rowCount > 0){
                $row = $sql->fetch(PDO::FETCH_ASSOC); 
                $_SESSION['logado'] = $row['id'];
                header('location: index.php');
            }
        }
        
        public function setUsuario($id){
            $this->id = $id;
           
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute(); 
            
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            
            $this->permissoes = str_replace(' ', '', explode(",", $row['permissoes']));
        }
        
        public function getPermissoes(){
            return $this->permissoes;
        }
        
        public function verificaPermissoes($permissao){
            if(in_array($permissao, $this->permissoes)){
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    

