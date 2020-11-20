<?php
use core\Router;

$router = new Router();

/* ********************************************************************************************************************** 
 * 
 *                                                          GET
 * 
 * ********************************************************************************************************************** */
$router->get('/', 'HomeController@index');
//$router->get('/sobre/{nome}', 'HomeController@sobreP');
//$router->get('/sobre', 'HomeController@sobre');
$router->get('/login', 'LoginController@signin');
$router->get('/cadastro', 'LoginController@signup');

$router->get('/perfil/{id}/follow', 'ProfileController@follow');
$router->get('/perfil/{id}', 'ProfileController@index');
$router->get('/perfil', 'ProfileController@index');
/*$router->get('/pesquisar');
$router->get('/amigos');
$router->get('/fotos');
$router->get('/configuracoes');*/
$router->get('/sair', 'HomeController@sair');



/* ********************************************************************************************************************** 
 * 
 *                                                          POST
 * 
 * ********************************************************************************************************************** */
$router->post('/login', 'LoginController@signinAction');
$router->post('/cadastro', 'LoginController@signupAction');
$router->post('/post/newPost', 'PostController@newPost');
//$router->post('/perfil/post/newPost', 'PostController@newPost');


