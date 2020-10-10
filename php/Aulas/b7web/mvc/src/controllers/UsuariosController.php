<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuario;

class UsuariosController extends Controller {

    public function novo(){
        $this->render('novo');
    }

    public function addAction(){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        if($nome && $email){
            $verifica_email = Usuario::select()->where('email', $email)->execute();
            if(count($verifica_email) == 0){
                Usuario::insert([
                    'nome' => $nome,
                    'email' => $email
                ])->execute();

                $this->redirect('../../../b7web%20-%20PHP/mvc/public/');
            }
        }
        $this->redirect('../../../b7web%20-%20PHP/mvc/public/novo');
    }

    public function editAction(){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        if($nome || $email){
            Usuario::update()->set('nome', $nome)->set('email', $email)->where('id', $id)->execute();
            $this->redirect('../../../b7web%20-%20PHP/mvc/public/');
        }

        $this->redirect('../../../b7web%20-%20PHP/mvc/public/usuario/{id}/editar');
    }

    public function delAction($editar){
        Usuario::delete()->where('id', $editar)->execute();
        $this->redirect('../../../b7web%20-%20PHP/mvc/public/');
    }


}