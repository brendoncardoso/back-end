<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\UserHandler;
use src\handlers\PostHandler;

class ProfileController extends Controller {

    protected $userHandler; 
    protected $postHandler;

    public function __construct(){
        $this->userHandler = new UserHandler();
        $this->postHandler = new PostHandler();
        
        if($this->userHandler->checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function index($attr = []) {
        $page = intval(empty($_GET['page']) ? 0 : $_GET['page']);

        $id = $this->userHandler->user->id;

        if(!empty($attr['id'])){
            if($this->userHandler->verifyIdExists($attr['id']) == true){
                $id = $attr['id'];
            }else{
                $this->redirect('/perfil');
            }
        }

        $getUser = $this->userHandler->getUser($id, true);
        $feed = $this->postHandler->getUserFeed($id, $page);
        $verifyUserRelation = $this->userHandler->isFollowing($_SESSION['id'], $id);

        $this->render('perfil', [
            'array' => $this->userHandler->user,
            'getUser' => $getUser,
            'feed' => $feed,
            'id_logado' => $_SESSION['id'],
            'isFollowing' => $verifyUserRelation
        ]);
    }

    public function follow($attr = []){
        $id_logado = $this->userHandler->user->id;

        if($this->userHandler->verifyIdExists($attr['id'])){
            if($this->userHandler->isFollowing($id_logado, $attr['id'])){
                //DEIXA DE SEGUIR
                $this->userHandler->unfollow($id_logado, $attr['id']);
            }else{
                //SEGUIR
                $this->userHandler->follow($id_logado, $attr['id']);
            }

            $this->redirect('/perfil/'.$attr['id']);
        }else{
            $this->redirect('/perfil');
        }

    }
}