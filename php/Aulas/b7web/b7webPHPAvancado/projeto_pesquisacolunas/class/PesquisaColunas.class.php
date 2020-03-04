<?php
    $obj_PesquisaColunas = new PesquisaColunas();
    
    /* 
    * Description of PesquisaColunas.class
    * 
    * @author Brendon
    */

    class PesquisaColunas {
        
        private $db; 
        private $numrows;
        private $array;
        
        public function __construct(){
            $this->db = new PDO("mysql:dbname=projeto_pesquisacolunas; host=localhost", "root", "");
            return "CONECTADO";
        }
        
        public function setSearch($busca){
            $sql = "SELECT * FROM usuarios WHERE email = :email || cpf = :cpf";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $busca);
            $sql->bindValue(':cpf', $busca);
            $sql->execute();
            $this->numrows = $sql->rowCount();
            
            $this->array = $sql->fetch(PDO::FETCH_ASSOC);
            return $this->array;
            
        }
        
        public function getArray(){
            return $this->array;
        }
        
        public function getNumRows(){
            return $this->numrows;
        }
    }
?>

