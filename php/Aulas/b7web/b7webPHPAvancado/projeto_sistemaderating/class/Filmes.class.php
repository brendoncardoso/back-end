<?php
    $filmes = new Filmes($db);
    $arrayFilmes = $filmes->selectFilmesAll();
    /* 
     * Description of Filmes
     * 
     * @author Brendon
     */

     class Filmes {
         
        private $db; 

        public function __construct($db){
            $this->db = $db;
        }
        
        public function selectFilmesAll(){
            $sql = "SELECT * FROM filmes";
            $sql = $this->db->query($sql);
            $sql->execute();
            
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        }
        
        public function insertVoto($id_filme, $nota){
            $sql = "INSERT INTO voto (id_filme, nota) VALUES (:id_filme, :nota)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_filme', $id_filme);
            $sql->bindValue(':nota', $nota);
            $sql->execute();
            
            $sql_select = "SELECT * FROM voto WHERE id_filme = :id_filme";
            $sql_select = $this->db->prepare($sql_select);
            $sql_select->bindValue(':id_filme', $id_filme);
            $sql_select->execute(); 
            $rowCount = $sql_select->rowCount();
                
            
//            echo "<pre>";
//            print_r($rowCount);
//            echo "</pre>"; exit;
           if($rowCount > 0){
               
                $fetch = $sql_select->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($fetch AS $key => $values){
                    $arrayVoto[$values['id_filme']][] = $values['nota'];
                }

                foreach($arrayVoto as $key => $values){
                    foreach($values as $votos){
                        print_r($votos);
//                        if($rowCount > 0){
//                            $votos = $votos;
//                        }else{
//                            $votos += $votos;
//                        }
                    }
                }
 exit;
                echo "<pre>";
                print_r($votos);
                echo "</pre>"; exit;
                //$media = ($votos/$rowCount);
                
                
                    
                $sql = "UPDATE filmes SET media = :media WHERE id = :id";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':id', $id_filme);
                $sql->bindValue(':media', $media);
                $sql->execute();
            }
        }
     }

