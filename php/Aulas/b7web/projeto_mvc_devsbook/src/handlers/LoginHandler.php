<?php
namespace src\handlers;
use src\models\User;

class LoginHandler {
    
    public $user;
    public $nome;
    public $foto;
    public $email;
    public $senha;
    public $token;
    
    public function __construct() {
        $this->user = new User();
    }
    
    public function checkLogin(){   
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $dados = $this->user->select()->table('usuarios')->where('token', $token)->one();
            if(count($dados) >= 1){
                $this->user->id = $dados['id'];
                $this->user->nome = $dados['nome'];
                $this->user->foto = $dados['foto'];
                $this->user->email = $dados['email'];
                $this->user->senha = $dados['senha'];
                $this->user->token = $dados['token'];
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

    public function verifyEmailExists($email){
        $verifyEmailExists = $this->user->select()->table('usuarios')->where('email', $email)->execute();
        return $verifyEmailExists ? true : false;
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

}