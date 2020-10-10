<?php
use core\Router;

$router = new Router();

//HOME
$router->get('/', 'HomeController@index');
$router->get('/sobre/{nome}', 'HomeController@sobreP');
$router->get('/sobre', 'HomeController@sobre');
$router->get('/usuario/{id}/editar', 'HomeController@editar');


//USUÁRIOS
$router->post('/novo', 'UsuariosController@addAction');
$router->post('/usuario/{id}/editar', 'UsuariosController@editAction');
$router->get('/usuario/{id}/deletar', 'UsuariosController@delAction');
$router->get('/novo', 'UsuariosController@novo');

