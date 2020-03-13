<?php

    $reserva = new Reserva($db);
    $arrayReserva = $reserva->getReservas();
    $numRows = $reserva->getNumRowsReserva();
    
    /* 
    * Description of Reserva
    * 
    * @author Brendon
    */

    class Reserva {
        
        private $db;
        private $numrows;
        
        public function __construct($db){
            $this->db = $db;
        }
        
        public function insertReserva($pessoa, $id_carro, $data_ini, $data_fim){
            $sql_select = "SELECT * FROM reserva WHERE id_carro = $id_carro AND data_ini > $data_fim || data_fim < $data_ini";
            $sql_select = $this->db->query($sql_select);
            $sql_select->execute(); 
            $rowCountReservas = $sql_select->rowCount(); 
            
            if($rowCountReservas == 0){
                $sql_insert = "INSERT INTO reserva (pessoa, id_carro, data_ini, data_fim) VALUES (:pessoa, :id_carro, :data_ini, :data_fim)";
                $sql_insert = $this->db->prepare($sql_insert);
                $sql_insert->bindValue(':pessoa', $pessoa);
                $sql_insert->bindValue(':id_carro', $id_carro);
                $sql_insert->bindValue(':data_ini', $data_ini);
                $sql_insert->bindValue(':data_fim', $data_fim);
                $sql_insert->execute();
            }
        }
        
        public function getReservas(){
            $array = array();
            
            $sql = "SELECT *, A.id AS id_reserva FROM reserva AS A INNER JOIN carro AS B on (A.id_carro = B.id)";
            $sql = $this->db->query($sql);
            $sql->execute();
            $this->numrows = $sql->rowCount();
            
            if($this->numrows > 0){
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            }else{
                
            }
            
            return $array;
        }
        
        public function getNumRowsReserva(){
            return $this->numrows;
        }
        
//        public function verificaDataReservas($id_carro, $data_ini, $data_fim){
//            $sql = "SELECT * FROM reserva WHERE id_carro = :id_carro AND data_ini > :data_fim || data_fim < :data_ini";
//            $sql = $this->db->query($sql);
// 
//            $sql->execute(); 
//            
//            $rowCountReservas = $sql->rowCount();        
//            
//            if($rowCountReservas > 0){
//                return TRUE;
//            }else{
//                return FALSE;
//            }
//        }
    }
