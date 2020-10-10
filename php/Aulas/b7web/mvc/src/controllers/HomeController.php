<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuario;


class HomeController extends Controller {

    public function index() {
        $array = Usuario::select(['id','nome','email'])->execute();

        $this->render('home', 
            ["array" => $array]
        );
    }

    public function indexFotos(){
        $this->render('fotos');
    }

    public function novo(){
        $this->render('novo');
    }

    public function editar($editar){
        $array = Usuario::select(['id', 'nome', 'email'])->where('id', $editar)->get();
        $this->render("/editar", [
                'usuarios' => $array
            ]
        );
    }

    public function getFotoId($array){
        echo "ID da image: ". $array['id'];
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }
}