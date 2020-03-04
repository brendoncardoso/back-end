<?php
    require 'include/header.php';
    include_once 'class/Lang.class.php';
    
    $id_linguagem = $_REQUEST['id_linguagem'];
    $dados = $obj_lang->selectLang($id_linguagem);
    
    if(isset($_POST['nome_linguagem']) && !empty($_POST['nome_linguagem'])){
        $nome_linguagem = $_POST['nome_linguagem'];
        $obj_lang->updateLang($id_linguagem, $nome_linguagem);
        header('location: view_lang.php');
    }
?>

<form method="POST">
    Palavra Antiga: <br>
    <input type="text" name="linguagem_antiga" value="<?php echo $dados['nome_linguagem']?>" disabled><br><br>
   
    Nova Palavra: <br>
    <input type="text" name="nome_linguagem" value=""><br><br>
    
    <input type="submit" value="Salvar"><br><br>
    <a href="view_lang.php">Voltar</a>
</form>