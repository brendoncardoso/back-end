<?php
    $dsn = "mysql:dbname=blog; host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try{
        $pdo = new PDO($dsn, $dbuser, $dbpass);

        $novonome = "Lúcio";
        $novoemail = "lucio@lucio.com";

        $sql = "UPDATE usuarios SET nome=:novonome, email=:novoemail WHERE id= '7'";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':novonome', $novonome);
        $sql->bindValue(':novoemail', $novoemail);
        $sql->execute();

        echo 'Usuário foi atualizado com sucesso!';
    }catch(PDOException $e){
        echo "Falhou em: ".$e->getMessage();
    }   
?>