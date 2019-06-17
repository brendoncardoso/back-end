<?php
session_start();

if(isset($_POST['email']) && empty($_POST['email']) == false){
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $dsn = "mysql:dbname=sistema_de_login; host:127.0.0.1";
    $dbuser = "root";
    $dbpass = "";

    try{
        $db = new PDO($dsn, $dbuser, $dbpass);
        $sql = $db->query("SELECT * FROM usuarios WHERE email= '$email' AND senha='$senha'");

        if($sql->rowCount()>0){
           $dado = $sql->fetch();
           $_SESSION['id'] = $dado['id'];

           header('location: index.php');
        }else{
            echo 'Esse usuário não existe.';
        }

    }catch(PDOException $e){
        echo "Falhou em: ".$e->getMessage();
    }

}
?>

<form action="" method="post">
    Email:<br>
    <input type="email" name="email"><br><br>

    Senha:<br>
    <input type="password" name="senha"><br><br>
    <input type="submit" value="Entrar">
</form>