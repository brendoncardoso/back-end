<?php
    require 'include/header.php';
    include_once 'class/Categoria.class.php';
    
    if(isset($_POST['palavra']) && !empty($_POST['palavra'])){
        $palavra = addslashes($_POST['palavra']);
        $obj_categoria->insertCategoria($palavra);
        header('location: view_categoria.php');
    }
?>

<form method="POST">
    Palavra: <br>
    <input type="text" name="palavra"><br><br>
    
    <input type="submit" value="Enviar"><br><br>
    <a href="view_categoria.php">Voltar</a><br><br>
</form>

