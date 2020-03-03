<?php
    require 'include/header.php';
    include_once 'class/Categoria.class.php';
    
    $id = addslashes($_REQUEST['id']);
    $dados = $obj_categoria ->selectCategoria($id);
    
    if(isset($_POST['palavra']) && !empty($_POST['palavra'])){
        $palavra = addslashes($_POST['palavra']);
        $obj_categoria->updateCategoria($palavra, $id);
        header('location: view_categoria.php');
    }
?>

<form method="POST">
    Palavra Antiga: <br>
    <input type="text" name="palavra_antiga" value="<?php echo $dados['palavra']?>" disabled><br><br>
   
    Nova Palavra: <br>
    <input type="text" name="palavra" value=""><br><br>
    
    <input type="submit" value="Salvar"><br><br>
    <a href="view_categoria.php">Voltar</a>
</form>
