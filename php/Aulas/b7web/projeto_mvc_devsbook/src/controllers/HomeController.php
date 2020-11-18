<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\PostHandler;

class HomeController extends Controller {

    protected $login; 
    protected $postHandler;

    public function __construct(){
        $this->login = new LoginHandler();
        $this->postHandler = new PostHandler();
        
        if($this->login->checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function index() {
        $page = intval(empty($_GET['page']) ? 0 : $_GET['page']);

        $feed = $this->postHandler->getHomeFeed($this->login->user->id, $page);
       
        $this->render('home', [
            'array' => $this->login->user,
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