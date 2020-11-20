<?php
namespace src\handlers;
use src\models\User;
use src\models\UserRelation;
use src\models\Post;
use src\handlers\PostHandler;

class UserHandler {
    
    public $user;
    public $id;
    public $nome;
    public $foto;
    public $email;
    public $senha;
    public $token;
    
    public function __construct() {
        $this->user = new User();
        $this->userRelation = new UserRelation();
        $this->post = new Post();
        $this->postHandler = new PostHandler();
    }
    
    public function checkLogin(){   
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];
            $_SESSION = $this->user->select()->table('usuarios')->where('token', $token)->one();
           
            if(count($_SESSION) >= 1){
                $this->user->id = $_SESSION['id'];
                $this->user->nome = $_SESSION['nome'];
                $this->user->foto = $_SESSION['foto'];
                $this->user->email = $_SESSION['email'];
                $this->user->senha = $_SESSION['senha'];
                $this->user->token = $_SESSION['token'];
            }else{
                return false;
            }
        }else{
            return false;
        }
    } 
    
    public function verifyLogin($email, $senha){
        $verifyLogin = $this->user->select()->table('usuarios')->where('email', $email)->one();
        if(count($verifyLogin)){
            if(password_verify($senha, $verifyLogin['senha'])){
                $_SESSION['token'] = md5(time().rand(0, 9999).time());

                $this->user->update()->table('usuarios')
                        ->set('token', $_SESSION['token'])
                        ->where('email', $email)
                ->execute();
                
                return $_SESSION['token'];
            }
        } else {
            return false;
        }
    }

    public function verifyIdExists($id){
        $verifyIdExists = $this->user->select()->table('usuarios')->where('id', $id)->one();
        return $verifyIdExists ? true : false;
    }

    public function verifyEmailExists($email){
        $verifyEmailExists = $this->user->select()->table('usuarios')->where('email', $email)->execute();
        return $verifyEmailExists ? true : false;
    }

    public function getUser($id, $full = false){
        $getCollection = $this->user->select()->table('usuarios')->where('id', $id)->one();

        if($getCollection){
            $this->user->id = $getCollection['id'];
            $this->user->email = NULL;
            $this->user->senha = NULL;
            $this->user->token = NULL;
            $this->user->nome = $getCollection['nome'];
            $this->user->cidade = $getCollection['cidade'];
            $this->user->trabalho = $getCollection['trabalho'];
            $this->user->data_nascimento = $getCollection['data_nascimento'];
            $this->user->foto = $getCollection['foto'];
            $this->user->cover = $getCollection['cover'];

            $data_atual = date('Y-m-d');
            $data_nascimento = date('m-d', strtotime($getCollection['data_nascimento']));
            $ano_nascimento = date('Y', strtotime($getCollection['data_nascimento']));
            $data_aniversario = date('Y').'-'.$data_nascimento;
            if($data_atual < $data_aniversario){
                $this->user->idade = date('Y') - $ano_nascimento - 1;
            }else{
                $this->user->idade = date('Y') - $ano_nascimento;
            }

            if($full == true){
                $this->user->seguidores = [];
                $this->user->seguindo = [];
                $this->user->fotos = [];

                $seguidoresGet = $this->userRelation->select()->table('usuarios_relacao')->where('user_to', $id)->get();
                foreach($seguidoresGet as $valueSeguidores) { 
                    $getUsersSeguidores = $this->user->select()->table('usuarios')->where('id', $valueSeguidores['user_from'])->one();

                    $newUser = new User();
                    $newUser->id = $getUsersSeguidores['id'];
                    $newUser->nome = $getUsersSeguidores['nome'];
                    $newUser->foto = $getUsersSeguidores['foto'];

                    $this->user->seguidores[] = $newUser;
                }

                $seguindoGet = $this->userRelation->select()->table('usuarios_relacao')->where('user_from', $id)->get();
                foreach($seguindoGet as $valueSeguindo) { 
                    $getUsersSeguindo = $this->user->select()->table('usuarios')->where('id', $valueSeguindo['user_to'])->one();

                    $newUser = new User();
                    $newUser->id = $getUsersSeguindo['id'];
                    $newUser->nome = $getUsersSeguindo['nome'];
                    $newUser->foto = $getUsersSeguindo['foto'];

                    $this->user->seguindo[] = $newUser;
                }

                $this->user->fotos = $this->postHandler->getPerfilPhotos($id);
            }

            return $this->user;
        }
        return false;
    }

    public function addUser($email, $senha, $nome_completo, $data_nascimento){
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $token = md5(time().rand(0, 9999).time());

        $this->user->insert([
            "email" => $email,
            "senha" => $senha,
            "nome" => $nome_completo,
            "data_nascimento" => $data_nascimento,
            "token" => $token
        ])->table('usuarios')->execute();

        return $token;
    }

    public function isFollowing($id_logado, $id_usuario){
        $verifyUserRelation = 
            $this->userRelation
            ->select()
            ->table('usuarios_relacao')
            ->where('user_from', $id_logado)
            ->where('user_to', $id_usuario)
            ->one();

        return $verifyUserRelation ? true : false;
    }

    public function follow($id_logado, $id_usuario){
        $this->userRelation
            ->insert([
                'user_from' => $id_logado,
                'user_to' => $id_usuario,
            ])
            ->table('usuarios_relacao')
            ->execute();
    }

    public function unfollow($id_logado, $id_usuario){
        $this->userRelation
            ->delete()
            ->table('usuarios_relacao')
            ->where('user_from', $id_logado)
            ->where('user_to', $id_usuario)
            ->execute();
    }

}