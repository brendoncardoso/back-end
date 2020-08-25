<?php
require 'config.php';
require 'dao/UsuarioDaoMySQL.php';
$usuarioDaoMySQL = new UsuarioDaoMySQL($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($id && $name && $email) {
    $newUsuario = new Usuario();
    $newUsuario->setId($id);
    $newUsuario->setNome($name);
    $newUsuario->setEmail($email);
    $usuarioDaoMySQL->update($newUsuario);

    header("Location: index.php");
    exit;
    
} else {
    header("Location: adicionar.php");
    exit;
}