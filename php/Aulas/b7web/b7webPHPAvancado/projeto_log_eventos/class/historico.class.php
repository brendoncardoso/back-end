<?php
    $obj_historico = new Historico();
    $resultAll = $obj_historico->selectAllHistorico();
    $rowCount = $obj_historico->rowCountHistorico();
    
    class Historico{
        
        private $db;

        public function __construct() {
            $this->db = new PDO("mysql:dbname=projeto_logeventos;host=localhost;", "root", "");
        }
        
        public function rowCountHistorico(){
            $sql_select = "SELECT * FROM historico";
            $sql_select = $this->db->prepare($sql_select);
            $sql_select->execute();
            $rowCount = $sql_select->rowCount();
            return $rowCount;
        }
        
        public function selectAllHistorico(){
            $sql_selectAll = "SELECT * FROM historico";
            $sql_selectAll = $this->db->prepare($sql_selectAll);
            $sql_selectAll->execute();
            $resultAll = $sql_selectAll->fetchAll(PDO::FETCH_ASSOC);
            return $resultAll;
        }
        
        public function insertHistorico($email){
            $verifica_email = "SELECT * FROM historico WHERE email = :email";
            $verifica_email = $this->db->prepare($verifica_email);
            $verifica_email->bindValue(':email', $email);
            $verifica_email->execute();
            $verifica_email_rowCount = $verifica_email->rowCount();
            
            if($verifica_email_rowCount == 0){
                $ip = addslashes($_SERVER['REMOTE_ADDR']);
                $sql_insert = "INSERT INTO historico (ip, data_registro, email) VALUES (:ip, NOW(), :email)";
                $sql_insert = $this->db->prepare($sql_insert);
                $sql_insert->bindValue(':ip', $ip);
                $sql_insert->bindValue(':email', $email);
                $sql_insert->execute();
                echo "<h1>Histórico criado com Sucesso!</h1> Clique <a href='index.php'>aqui</a> para voltar"; exit;
            }else{
                echo "<h1>Atenção! Esse Email já existe. Cliquei <a href='index.php'>aqui</a> para Voltar.</h1>"; exit;
            }
        }
        
        public function selectHistorico($id){
            $id = addslashes($_REQUEST['id']);
            $sql_select = "SELECT * FROM historico WHERE id = :id";
            $sql_select = $this->db->prepare($sql_select);
            $sql_select->bindValue(':id', $id);
            $sql_select->execute();
            $result = $sql_select->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        
        public function updateHistorico($id, $email){
            $verifica_email = "SELECT * FROM historico WHERE email = :email";
            $verifica_email = $this->db->prepare($verifica_email);
            $verifica_email->bindValue(':email', $email);
            $verifica_email->execute();
            $verifica_email_rowCount = $verifica_email->rowCount();
            
            if($verifica_email_rowCount == 0){
                $sql_update = "UPDATE historico SET email = :email WHERE id = :id";
                $sql_update = $this->db->prepare($sql_update);
                $sql_update->bindValue(':id', $id);
                $sql_update->bindValue(':email', $email);
                $sql_update->execute();
                echo "<h1>Email do Histórico alterado com Sucesso! Clique <a href='index.php'>aqui</a> para voltar.</h1>"; exit;
            }else{
                echo "<h1>Atenção! Esse Email já existe. Clique <a href=editar.php?id=$id'>aqui</a> para Voltar.</h1>"; exit;
            }
        }
        
        public function deleteHistorico($id){
            $id = addslashes($_REQUEST['id']);
            $sql_delete = "DELETE FROM historico WHERE id = :id";
            $sql_delete = $this->db->prepare($sql_delete);
            $sql_delete->bindValue(':id', $id);
            $sql_delete->execute();
        }
    }
