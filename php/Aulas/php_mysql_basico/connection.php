<?php
    //Conectando Php com mySQLi
    include 'config.php';

    //ini_set('mysqli.allow_persistent', On);
    //ini_set('mysqli.max_persistent', -1);
    //ini_set('mysqli.max_links', 1);

    /**O que sãp Conexões Persistentes? */

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if($conn->connect_errno){
        die('Houve Falha a conectar em ('.$conn->connect_errno.')'.$conn->connect_error);
    };

    echo $conn->host_info;

    //Executando Comando do Banco de Dados
    echo "<br>";
    $sql = 'CREATE TABLE products(
        `id` INT PRIMARY KEY AUTO_INCREMENT,
        `email` VARCHAR(255) NOT NULL
    )';
    
    //Executando a Query
    if(!$conn->query($sql)){
        echo 'Essa tabela já existe';
    }
    echo "<br>";

    //$result = $conn->query('INSERT INTO users (email) VALUE ("brendon@brendon.com")');

    /**Listando dados do Banco */
    $result = $conn->query('SELECT * FROM users');

    $users = $result->fetch_all(MYSQLI_ASSOC);
    foreach($users as $user){
        echo $user['id']. ' - ' .$user['email']. '</br>';
    };
    echo '<pre>';
    var_dump($users);
    
    /*echo "<ul>";
    while($user = $result->fetch_assoc()){
        echo '<li>'.$user['id'].' - '.$user['email'].'</li>';
    };

    echo "</ul>";*/

    //var_dump($result);
?>