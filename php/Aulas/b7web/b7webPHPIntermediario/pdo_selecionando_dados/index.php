<?php
    $dsn = "mysql:dbname=blog; host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        $sql = "SELECT * FROM usuarios";
        $sql = $pdo->query($sql);

        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() AS $usuario){
                echo "Nome: ".$usuario['nome']." - "."Email: ".$usuario['email']." - "."Senha Criptografada: ".$usuario['senha']."</br>";
            }
        }
    }catch(PDOException $e){
        echo "Falhou em: ".$e->getMessage();
    }

?>