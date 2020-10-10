<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class HomeController extends Controller {

    private $login; 

    public function __construct(){
        $this->login = new LoginHandler();
        
        if($this->login->checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function index() {
        $this->render('home', ['nome' => 'Bonieky']);
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}