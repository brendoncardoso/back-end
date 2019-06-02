<?php
    include 'config.php';
    $email = $_GET['email']?$_GET['email']: null;
    $id = $_GET['id']?$_GET['id']: 0;

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $result = $conn->query('SELECT * FROM users WHERE id >'.$id);
    $users = $result->fetch_all(MYSQLI_ASSOC); 

    foreach($users as $user){
        echo $email['id']. ' - ' . $email['email']; 
    }
?>

