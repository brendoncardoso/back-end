<?php
    include ('class/AcessoClass.php');
    $ip = $_SERVER['REMOTE_ADDR'];
    $hora = date('Y-m-d H:i:s');
    $acesso->selectUsers($hora);
    $acesso->deleteUser($hora);
//    $acesso->insertUser($ip, $hora);
    $users_online = $acesso->usersOnline();
?>

<h1>Online: <?php echo $users_online; ?></h1>

