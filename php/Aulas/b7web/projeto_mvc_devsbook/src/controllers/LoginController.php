<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller {

    private $login;
    
    public function __construct(){
        $this->login = new LoginHandler();
    }
    
    public function signin() {
        $message = '';
        if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            $message = $_SESSION['message']; 
            $_SESSION['message'] = '';
        }
        
        $this->render('login', ['message' => $message]);
    }

    public function signup() {
        $this->render('cadastro');
    }
    
    public function signinActions() {
        
        $email = $_POST['email'];
        $senha = $_POST['password'];
        
        if($email && $senha){
            if($this->login->verifyLogin($email, $senha) == TRUE){
                $token = $_SESSION['token'];
                $this->render('/');
            }else{
                $_SESSION['message'] = "Email e/ou Senha estão incorretas.";
                $this->render('login');
            }
        }else{
            $_SESSION['message'] = "Formulário não foi preenchido corretamente";
            $this->render('login');
        }
    }
}