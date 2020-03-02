<?php
    session_start();
    
    if(isset($_GET['lang']) && !empty($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];
    }
    
    require 'class/Language.class.php';
?>

<a href="index.php?lang=en">English</a> <br> 
<a href="index.php?lang=pt-BR">Português - Brasil</a> <br> 
<a href="index.php?lang=pt-PT">Português - Portugal</a> <br> 
<a href="index.php?lang=jp">Japan</a> <br> 
<hr>

Linguagem Definida: <?php echo $obj_linguage->getLinguage(); ?> <br><br>

<button><?php echo $obj_linguage->getTranslation(); ?></button>

