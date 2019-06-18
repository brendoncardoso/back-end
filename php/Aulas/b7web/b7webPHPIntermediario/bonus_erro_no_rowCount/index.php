<?php
    $dsn = "mysql:dbname=b7web; host=localhost";
    $dbuser = "root";
    $dbpass = "";
try{
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo 'Houve falha em:' .$e->getMessage();
}

$sql = "SELECT * FROM usuarios";
$sql = $pdo->query($sql);
echo 'Total de usuários, é de: '. $sql->rowCount();

?>

