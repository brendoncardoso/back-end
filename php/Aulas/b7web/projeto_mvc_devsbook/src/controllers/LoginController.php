<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\UserHandler;

class LoginController extends Controller {

    private $login;
    
    public function __construct(){
        $this->userHandler = new UserHandler();
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
        $message = '';
        if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            $message = $_SESSION['message']; 
            $_SESSION['message'] = '';
        }
        
        $this->render('cadastro', ['message' => $message]);
    }
    
    public function signinAction() {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        if($email && $senha){
            if($this->userHandler->verifyLogin($email, $senha) == TRUE){
                $_SESSION['token'] == $this->userHandler->verifyLogin($email, $senha);
                $this->redirect('/');
            }else{
                $_SESSION['message'] = "Email e/ou Senha estão incorretas.";
                $this->render('login');
            }
        }else{
            $_SESSION['message'] = "Formulário não foi preenchido corretamente";
            $this->render('login');
        }
    }
    
    public function signupAction() {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nome_completo = $_POST['nome_completo'];
        $data_nascimento = $_POST['data_nascimento'];

        if($email && $senha && $nome_completo && $data_nascimento){
            $data_aniversario = explode('/', $data_nascimento);
            if(count($data_aniversario) != 3){
                $_SESSION['message'] = 'Data inválida. Por favor, tente novamente';
                $this->render('cadastro');
            }

            $data_nascimento_bd = $data_aniversario[2]."-".$data_aniversario[1]."-".$data_aniversario[0];
            
            if($this->userHandler->verifyEmailExists($email) == false){
                $token = $this->userHandler->addUser($email, $senha, $nome_completo, $data_nascimento_bd);
                $_SESSION['token'] = $token;
                $this->redirect('/');

            }else{
                $_SESSION['message'] = 'Esse e-mail já está em uso.';
                $this->render('cadastro');
            }
        }
    }
}