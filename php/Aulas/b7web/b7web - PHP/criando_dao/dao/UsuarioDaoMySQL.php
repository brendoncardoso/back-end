<?php 
    require 'models/Usuario.php';

    Class UsuarioDaoMySQL implements UsuarioDao {

        private $pdo;

        public function __construct($driver){
            $this->pdo = $driver;
        }

        public function add(Usuario $obj){
            $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
            $sql->bindValue(':name', $obj->getNome());
            $sql->bindValue(':email', $obj->getEmail());
            $sql->execute();
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

        public function findByEmail($email){
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function findId($id){
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $dados = $sql->fetch(PDO::FETCH_ASSOC);
                $newUsuario = new Usuario();
                $newUsuario->setId($id);
                $newUsuario->setNome($dados['nome']);
                $newUsuario->setEmail($dados['email']);

                return $newUsuario;
            } else {
                return FALSE;
            }
        }

        public function update(Usuario $obj){
            $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :name, email = :email WHERE id = :id");
            $sql->bindValue(':name', $obj->getNome());
            $sql->bindValue(':email', $obj->getEmail());
            $sql->bindValue(':id', $obj->getId());
            $sql->execute();
        }

        public function delete($id){
            $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
        }
    }
?>