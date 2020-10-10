<?php 
    require 'config.php';
    require 'class/AnunciosClass.php';
    require 'class/UsuariosClass.php';
    require 'pages/header.php';
    $usuario = new Usuarios();
    $categorias = new Anuncios();
    $categorias->deleteAnuncio($_REQUEST['id']);
    header('location: meus_produtos.php');
?>