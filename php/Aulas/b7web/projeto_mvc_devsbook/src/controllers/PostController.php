<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\PostHandler;

class PostController extends Controller {

    public $loginHandler;
    public $postHandler;
    public $user;
    public $nome;
    public $foto;
    public $email;
    public $senha;
    public $token;
    public $post;

    public function __construct(){
        $this->loginHandler = new LoginHandler();
        $this->postHandler = new PostHandler();
        
        if($this->loginHandler->checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function newPost(){
        $body = rtrim($_POST['newPost']);
        $id_usuario = $this->loginHandler->user->id;

        if(!empty($id_usuario) && !empty($body)){
            $this->postHandler->addNewPost($id_usuario, 'text', $body);
            $this->redirect('/');
        }
    }

}