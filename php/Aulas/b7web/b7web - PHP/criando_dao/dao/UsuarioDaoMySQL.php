<?php 
    require 'models/Usuario.php';

    Class UsuarioDaoMySQL implements UsuarioDao {

        private $pdo;

        public function __construct($driver){
            $this->pdo = $driver;
        }

        public function add(Usuario $obj){
            
        }

        public function findAll(){
            $usuario = new Usuario();
            $array = [];
            $sql = $this->pdo->query("SELECT * FROM usuarios");
            if($sql->rowCount() > 0) {
                $fetchall = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            foreach($fetchall as $dados){
                $usuario = new Usuario();

                $usuario->setId($dados['id']);
                $usuario->setNome($dados['nome']);
                $usuario->setEmail($dados['email']);

                $array[] = $usuario;
            }            
            return $array;
        }

        public function findAssoc($id){
            
        }

        public function update(Usuario $obj){
            
        }

        public function delete($id){
            
        }
    }
?>