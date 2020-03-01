<?php 
    require 'class/historico.class.php';
    $id = addslashes($_REQUEST['id']);
    
    if(empty($id)){
        header('location: index.php'); 
    }else{
        $result = $obj_historico->selectHistorico($id);
    }
    
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $id = addslashes($result['id']);
        $email = addslashes($_POST['email']);
        $obj_historico->updateHistorico($id, $email);
    }
?>

<form method="POST">
    IP: <br>
    <input type="text" name="ip" value="<?php echo $result['ip']; ?>" disabled>
    <br>
    <br>

    Antigo Email: <br>
    <input type="email" name="email" value="<?php echo $result['email']; ?>" disabled>
    <br>
    <br>
    
    Novo Email: <br>
    <input type="email" name="email">
    <br>
    <br>

    <input type="submit" value="Salvar">
    <br>
    <br>
    <a href="index.php">Voltar</a>
</form>

