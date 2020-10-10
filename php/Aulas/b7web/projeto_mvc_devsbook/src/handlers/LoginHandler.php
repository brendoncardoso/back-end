<?php
namespace src\handlers;
use src\models\User;

class LoginHandler {
    
    private $user;
    
    public function __construct() {
         $this->user = new User();
    }
    
    public function checkLogin(){        
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $dados = $this->user->select()->where('token', $token)->execute();
            if(count($dados) >= 1){
                $this->user->id = $dados['id'];
                $this->user->nome = $dados['nome'];
                $this->user->email = $dados['email'];
                $this->user->senha = $dados['senha'];
                $this->user->senha = $dados['token'];
            }
        } 
        
        return false;
    } 
    
    public function verifyLogin($email, $senha){
        $verifyLogin = $this->user->select()->where('email', $email)->execute();

        if(count($verifyLogin)){
            if(password_verify($password, $verifyLogin['token'])){
                $this->user->update()
                        ->set('token', $token)
                        ->where('email', $email)
                ->execute();
                
                return $token;
            }
        } else {
            
            return false;
        }
    }

}