<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class PostController extends Controller {

    public $user;

    public function __construct(){
        $this->user = new LoginHandler();
    }

    public function newPost(){
        
    }

}