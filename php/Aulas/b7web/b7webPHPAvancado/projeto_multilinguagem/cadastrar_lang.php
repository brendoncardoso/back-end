<?php
    require 'include/header.php';
    include_once 'class/Lang.class.php';
    
    if(isset($_POST['nome_linguagem']) && !empty($_POST['nome_linguagem'])){
        $nome_linguagem = addslashes($_POST['nome_linguagem']);
        $obj_lang->insertLang($nome_linguagem);
        header('location: view_lang.php');
    }
?>

<form method="POST">
    Linguagem: <br>
    <input type="text" name="nome_linguagem"><br><br>
    
    <input type="submit" value="Enviar"><br><br>
    <a href="view_lang.php">Voltar</a><br><br>
</form>