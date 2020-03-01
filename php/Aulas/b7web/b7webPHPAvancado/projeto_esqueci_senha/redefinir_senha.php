<?php
    require 'config.php';
//    echo "<pre>";
//    print_r($_REQUEST);
//    echo "</pre>";
       
    $hash = isset($_REQUEST['hash']) ? $_REQUEST['hash'] : NULL;
    $id_usu = isset($_REQUEST['id_usu']) ? $_REQUEST['id_usu'] : NULL;
    if(!isset($hash) && empty($hash)){
        header('location: index.php');
    }
    
    $sql_select_token = "SELECT * FROM usuarios AS A INNER JOIN usuarios_token AS B ON (A.id_usu = B.id_usu) WHERE B.id_usu = :id_usu AND B.status = 1";
    $sql_select_token = $pdo->prepare($sql_select_token);
    $sql_select_token->bindValue(':id_usu', $id_usu);
    $sql_select_token->execute(); 
    $result_select_token = $sql_select_token->fetch(PDO::FETCH_ASSOC);
    
//    echo "<pre>";
//    print_r($result_token);
//    echo "</pre>";
    
    if(isset($_POST['nova_senha']) && !empty($_POST['nova_senha'])){
        $nova_senha = addslashes($_POST['nova_senha']);
        $sql_update_token = "UPDATE usuarios SET senha = md5(:senha) WHERE id_usu = :id_usu";
        $sql_update_token = $pdo->prepare($sql_update_token);
        $sql_update_token->bindValue(':senha', $nova_senha);
        $sql_update_token->bindValue(':id_usu', $id_usu);
        $sql_update_token->execute(); 
        
        $sql_delete_token = "DELETE FROM usuarios_token WHERE id_usu = :id_usu";
        $sql_delete_token = $pdo->prepare($sql_delete_token);
        $sql_delete_token->bindValue(':id_usu', $id_usu);
        $sql_delete_token->execute();
        
        echo "<h1>Senha do Usuário foi alterado com Sucesso! Clique <a href='index.php'>aqui</a> para voltar.</h1>"; exit;
    }
?>

<?php if(isset($hash) && !empty($hash)) { ?>
    <form method="POST">
        Email: <br>
        <input type="email" name="email" value="<?php echo $result_select_token['email']; ?>" disabled>
        <br>
        <br>
        Nova Senha: <br>
        <input type="password" name="nova_senha">
        <br><br>
        <input type="submit" value="Salvar">
    </form>
    <a href="index.php">Voltar</a>
<?php } ?>


