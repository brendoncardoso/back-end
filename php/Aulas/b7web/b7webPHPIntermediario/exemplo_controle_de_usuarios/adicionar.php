<?php
    require 'config.php';

    if(isset($_POST['nome']) && empty($_POST['nome']) == false){
        
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = md5(addslashes($_POST['senha']));
        
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        $sql = $pdo->query($sql);

        header("location: index.php");
    }
?>
    <form action="" method="post">
        Nome:<br>
        <input type="text" name="nome" required><br>

        Email:<br>
        <input type="email" name="email" required><br>

        Senha:<br>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Enviar">
    </form>