<?php
require 'config.php';
require 'dao/UsuarioDaoMySQL.php';
$usuarioDaoMySQL = new UsuarioDaoMySQL($pdo);

$id = filter_input(INPUT_GET, 'id');
if($id) {
    $usuarioDaoMySQL->delete($id);
}

header("Location: index.php");
exit;