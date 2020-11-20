<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\UserHandler;
use src\handlers\PostHandler;

class PostController extends Controller {

    public $UserHandler;
    public $postHandler;
    public $user;
    public $nome;
    public $foto;
    public $email;
    public $senha;
    public $token;
    public $post;

    public function __construct(){
        $this->UserHandler = new UserHandler();
        $this->postHandler = new PostHandler();
        
        if($this->UserHandler->checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function newPost(){
        $body = rtrim($_POST['newPost']);
        $id_usuario = $this->UserHandler->user->id;

        if(!empty($id_usuario) && !empty($body)){
            $this->postHandler->addNewPost($id_usuario, 'text', $body);
            $this->redirect('/');
        }
    }

}