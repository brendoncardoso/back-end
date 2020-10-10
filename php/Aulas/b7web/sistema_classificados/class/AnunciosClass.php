<?php 

    
    class Anuncios {

        private $id;

        
        public function rowCountAnuncios(){
            global $pdo;
            
            $sql = $pdo->prepare("SELECT * FROM anuncios");
            $sql->execute();
            $countAnuncios = $sql->rowCount();

            return $countAnuncios;
        }

        public function getMyAnuncious($id){
            global $pdo;

            $array = array();
            $sql = $pdo->prepare("SELECT A.id, A.id_usuario, A.id_categoria, C.nome as nome_categoria, A.titulo, A.descricao, A.valor, A.status, B.url FROM anuncios AS A LEFT JOIN anuncio_imagens AS B ON (A.id = B.id_anuncio) LEFT JOIN categorias AS C ON (A.id_categoria = C.id) WHERE A.id_usuario = :id_usuario");
            $sql->bindValue(':id_usuario', $id);
            $sql->execute();
            
            if($sql->rowCount()){
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);

                return $array;
            }else{
                return FALSE;
            }

        }

        public function getMyAnunciou($id){
            global $pdo;

            $array = array();
            $sql = $pdo->prepare("SELECT * FROM anuncios WHERE id_usuario = :id_usuario");
            $sql->bindValue(':id_usuario', $id);
            $sql->execute();
            
            $array = $sql->fetch(PDO::FETCH_ASSOC);

            return $array; 
        }

        public function getCategorias(){
            global $pdo;
            
            $categorias = array();

            $sql = $pdo->prepare("SELECT * FROM categorias");
            $sql->execute();

            $categorias = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $categorias;
        }

        public function insertAnuncio($id_usuario, $titulo, $id_categoria, $descricao, $valor, $url){
            global $pdo;

            $sql = $pdo->prepare("INSERT INTO anuncios (id_usuario, titulo, id_categoria,  descricao, valor) VALUES (:id_usuario, :titulo, :id_categoria, :descricao, :valor)");
            $sql->bindValue(':id_usuario', $id_usuario);
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':id_categoria', intval($id_categoria));
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':valor', $valor);

            if($sql->execute()){
                $id_anuncio = $pdo->lastInsertId();

                $sql = $pdo->prepare("INSERT INTO anuncio_imagens (id_anuncio, url) VALUES (:id_anuncio, :url)");
                $sql->bindValue(':id_anuncio', $id_anuncio);
                $sql->bindValue(':url', $url);
                $sql->execute();
            };
        }

        public function updateAnuncio($id_usuario, $titulo, $id_categoria, $descricao, $valor){
            global $pdo;

            $sql = $pdo->prepare("UPDATE anuncios SET titulo = :titulo, id_categoria = :id_categoria, descricao = :descricao, valor = :valor WHERE id_usuario = :id_usuario");
            $sql->bindValue(':id_usuario', $id_usuario);
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':id_categoria', intval($id_categoria));
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':valor', $valor);
            $sql->execute();
        }

        public function deleteAnuncio($id){
            global $pdo;

            $sql = $pdo->prepare("DELETE FROM anuncios WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
        }
    }
?>