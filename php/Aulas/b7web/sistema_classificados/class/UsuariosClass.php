<?php 
   
    class Usuarios {
        private $nome;
        private $email;
        private $telefone;
        private $senha;
        private $pdo;


        public function rowCountUsuarios(){
            global $pdo;
            
            $sql = $pdo->prepare("SELECT * FROM usuarios");
            $sql->execute();
            $countUsuarios = $sql->rowCount();

            return $countUsuarios;
        }

        public function cadastrar($nome, $email, $telefone, $senha){
            global $pdo;
            
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() == 0){
                $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)");
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':telefone', $telefone);
                $sql->bindValue(':senha', $senha);
                $sql->execute();

                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function login($email, $senha){
            global $pdo;
            
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();

            if($sql->rowCount()){
                $dados = $sql->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id'] = $dados['id'];
                header('location: index.php');
            }else{
                return FALSE;
            }
        }
    }
?>