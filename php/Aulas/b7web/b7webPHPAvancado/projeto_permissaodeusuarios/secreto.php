<?php
    session_start();
    include 'class/Db.class.php';
    include 'class/Usuarios.class.php';
    include 'class/Documentos.class.php';
    
    
    if(!isset($_SESSION['logado'])){
        header('location: login.php');
    }

    $usuario->setUsuario($_SESSION['logado']);
?>

<?php if($usuario->verificaPermissoes('SECRET') != TRUE) { ?>
    <?php header('location: index.php'); ?>
<?php } else {  ?>
    <?php echo "Página Secreta"; ?>
<?php } ?>

