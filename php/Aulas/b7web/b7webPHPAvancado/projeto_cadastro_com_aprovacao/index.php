<?php
    require '../../../../connection_pdo.php';

    if(isset($_POST['nome']) & !empty($_POST['nome']) && 
    isset($_POST['email']) && !empty($_POST['email'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);

        $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email'";
        $sql = $pdo->prepare($sql);
        $sql->execute();
        $getId = $pdo->lastInsertId();

        $md5 = md5($getId);
        $link = "confirmar.php?id=".$md5;
        $assunto = "<script>Alert('Por favor, Confirme no seu Email na Caixa de Entrada.')</script>";
        $mensagem = "Clique aqui para confirmar o seu cadastro";
        $xmailer = "X-Mailer: PHP/".phpversion();
        $headers = "From: brendon.carvalho@f71.com.br"."\r\n".$xmailer;
        mail($email, $assunto, $mensagem, $headers);
    }
?>

<form action="" method="post">
    <label for="">Nome</label><br>
    <input type="text" name="nome">
    <br><br>


    <label for="">Email:</label><br>
    <input type="email" name="email">
    <br><br>

    <input type="submit" name="cadastrar" value="Cadastrar">
</form>