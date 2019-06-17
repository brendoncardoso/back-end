<?php
    require 'config.php';

    $id = 0;

    if(isset($_GET['id']) && empty($_GET['id']) == false){
        $id = addslashes($_GET['id']);
    }

    if(isset($_POST['nome']) && empty($_POST['nome']) == false){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id= $id";
        $pdo->query($sql);

        header("location:index.php");
    }

    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
    }else{
        header("location:index.php");
    }
?>
<form action="" method="post">
    Nome:<br>
    <input type="text" name="nome" value="<?php echo $dado['nome']; ?>" required><br>

    Email:<br>
    <input type="email" name="email" value="<?php echo $dado['email']; ?>" required><br><br>

    <input type="submit" value="Enviar">
</form>
