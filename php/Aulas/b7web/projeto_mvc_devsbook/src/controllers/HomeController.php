<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\UserHandler;
use src\handlers\PostHandler;

class HomeController extends Controller {

    protected $userHandler; 
    protected $postHandler;

    public function __construct(){
        $this->userHandler = new UserHandler();
        $this->postHandler = new PostHandler();
        
        if($this->userHandler->checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function index() {
        $page = intval(empty($_GET['page']) ? 0 : $_GET['page']);

        $feed = $this->postHandler->getHomeFeed($this->userHandler->user->id, $page);
       
        $this->render('home', [
            'array' => $this->userHandler->user,
            'feed_item_array' => $feed
        ]);
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sair(){
        session_destroy();
        $this->redirect('/login');
    }

    public function sobreP($args) {
        print_r($args);
    }

}