<?php 
    require 'config.php'; 
    
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        
        $sql_verifica_login = "SELECT * FROM usuarios WHERE email = :email";
        $sql_verifica_login = $pdo->prepare($sql_verifica_login);
        $sql_verifica_login->bindValue(':email', $email);
        $sql_verifica_login->execute(); 
        $num_rows = $sql_verifica_login->rowCount();
        
//        echo "<pre>";
//        print_r($num_rows);
//        echo "</pre>";
//        exit;
        
        if($num_rows == 0){
            $sql = "INSERT INTO usuarios (email, senha) VALUES (:email, md5(:senha))";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();
            
            echo "<h1>Usuário Cadastrado com Sucesso! Clique <a href='index.php'>aqui</a> para continuar.</h1>"; exit;
        }else{
            echo "<h1>Esse email já existe no Banco de Dados. Clique <a href='cadastrar.php'>aqui</a> para voltar.</h1>"; exit;
        }
    }
?>

<form method="POST">
    Email: <br>
    <input type="email" name="email">
    <br>
    
    Senha: <br>
    <input type="password" name="senha">
    <br><br>
    <input type="submit" value="Cadastrar">
</form>
<a href="index.php">Voltar</a>
