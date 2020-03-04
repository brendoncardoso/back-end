<?php
    session_start();
    
    if(isset($_GET['lang']) && !empty($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];
    }
    
    require 'class/Translation.class.php';
    require 'class/Categoria.class.php';
    require 'class/Lang.class.php';
    $server = $_SERVER['REQUEST_URI'];    
?>
<style>
    .text-center{
        text-align: center;
    }
</style>

<?php foreach ($arraySelectAll AS $values) { ?>
    <a href="<?php echo $server."?lang=".$values['nome_linguagem']; ?>"><?php echo $values['nome_linguagem']; ?></a> <br> 
<?php } ?>
<hr>
Linguagem Definida: <?php echo $obj_translation->getLinguage(); ?> <br><br>
<hr>