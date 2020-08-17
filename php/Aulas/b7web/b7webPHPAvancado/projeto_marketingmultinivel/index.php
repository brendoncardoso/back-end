<?php
    session_start();
    include ('class/MultiNivelClass.php');
    
    if(!isset($_SESSION['logado'])){
        header('location: login.php');
    }
    
    $multinivel->selectUser($_SESSION['logado']);
    $getUser = $multinivel->getUser();
    
    $limite = 3;
    $getUsers = $multinivel->selectUsers($_SESSION['logado'], $limite);
    $rowCountUsers = $multinivel->getNumRowsUsers();
    echo "<pre>";
    print_r($getUsers);
    echo "</pre>";
       
?>

<h1>Usuário: <?php echo $getUser['email']; ?></h1>
<a href="sair.php">Sair</a>

<br>
<br>

<a href="cadastrar.php">Cadastrar Usuário</a>

<br>
<br>

    <ul>
        <?php foreach($getUsers AS $usuarios) { ?>
            <li><?php echo $usuarios['email']; ?>
                <?php if(count($usuarios['filhos']) > 0) { ?>
                    <ul>
                        <?php foreach($usuarios['filhos'] as $key => $usuarios_filhos) { ?>
                            <li><?php echo $usuarios_filhos['email']; ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>


