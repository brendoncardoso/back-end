<?php
    $dsn = "mysql:dbname=blog; host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        $novasenha = md5("teste123");

        $sql = "UPDATE usuarios SET senha ='$novasenha' WHERE id = 4";
        $pdo->query($sql);

        echo "Senha do Usuário foi alterada com sucesso!";
    }catch(PDOException $e){
        echo "Falhou em: ".$e->getMessage();
    }
?>