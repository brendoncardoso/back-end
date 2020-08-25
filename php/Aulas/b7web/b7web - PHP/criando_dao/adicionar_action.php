<?php
require 'config.php';
require 'dao/UsuarioDaoMySQL.php';
$usuarioDaoMySQL = new UsuarioDaoMySQL($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {

    $verifica_email = $usuarioDaoMySQL->findByEmail($email);

    if($verifica_email === FALSE){
        $obj = new Usuario();
        $obj->setNome($name);
        $obj->setEmail($email);
        
        $usuarioDaoMySQL->add($obj);
        
        header("Location: index.php");
        exit;
    }else{
        header("Location: adicionar.php");
        exit;
    }

    /*$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0) {
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->execute();

        header("Location: index.php");
        exit;
    } else {
        header("Location: adicionar.php");
        exit;
    }*/
} else {
    header("Location: adicionar.php");
    exit;
}