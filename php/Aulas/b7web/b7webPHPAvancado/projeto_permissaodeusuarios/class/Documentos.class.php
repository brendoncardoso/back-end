<?php    
    $documentos = new Documentos($db);
    /* 
    * Description of Documentos.class
    * 
    * @author Brendon
    */

    class Documentos {
        private $db;
        
        public function __construct($db){
            $this->db = $db;
        }
        
        public function getDocumentos() {
            $array = array();
            
            $sql = "SELECT * FROM documentos";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            $rowCount = $sql->rowCount();
            
            if($rowCount > 0){
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            }
            
            return $array;
        }
    }

