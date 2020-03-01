<?php 
    require 'config.php'; 

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = addslashes($_POST['email']);
        
        $sql_verifica_login = "SELECT * FROM usuarios WHERE email = :email";
        $sql_verifica_login = $pdo->prepare($sql_verifica_login);
        $sql_verifica_login->bindValue(':email', $email);
        $sql_verifica_login->execute(); 
        $num_rows = $sql_verifica_login->rowCount();
        
        if($num_rows != 0){
//            echo "EXISTE"; exit;
            $result = $sql_verifica_login->fetch(PDO::FETCH_ASSOC);
            $id_usu = $result['id_usu'];
            $token = md5(time().rand(0, 99999).rand(0, 99999));
            $expiramento = date('Y-m-d H:i', strtotime('+2 months'));
            $dia_atual = date('Y-m-d');

//            echo "<pre>";
//            print_r($dia_atual);
//            echo "</pre>";
//            exit;
            
            $sql_verifica_token = "SELECT * FROM usuarios_token WHERE id_usu = :id_usu AND status = 1";
            $sql_verifica_token = $pdo->prepare($sql_verifica_token);
            $sql_verifica_token->bindValue(':id_usu', $id_usu);
            $sql_verifica_token->execute();
            $num_rows_token = $sql_verifica_token->rowCount();
            $result_token = $sql_verifica_token->fetch(PDO::FETCH_ASSOC);
            
//            echo "<pre>";
//            print_r($num_rows_token);
//            echo "</pre>";
            
            if($num_rows_token == 0){
                $sql_insert_token = "INSERT INTO usuarios_token (id_usu, hash, expirado_em) VALUES (:id_usu, :hash, :expirado_em)";
                $sql_insert_token = $pdo->prepare($sql_insert_token);
                $sql_insert_token->bindValue(':id_usu', $id_usu);
                $sql_insert_token->bindValue(':hash', $token);
                $sql_insert_token->bindValue(':expirado_em', $expiramento);
                $sql_insert_token->execute();
                
                echo "<h1>Atenção! Token cadastrado com sucesso!</h1>"; exit;
            }else{
//                echo "<pre>";
//                print_r($expiramento_token);
//                echo "</pre>";
//                
//                echo "<pre>";
//                print_r($dia_atual);
//                echo "</pre>";
                
                if($result_token['expirado_em'] > $dia_atual){
//                    echo "TOKEN LIBERADO";
                    $link = "http://localhost/back-end/php/Aulas/b7web/b7webPHPAvancado/projeto_esqueci_senha/redefinir_senha.php?id_usu=".$result_token['id_usu']."&hash=".$result_token['hash'];
                    $mensagem = "<h1>Clique <a href='$link'>aqui</a> para redefinir a Senha.</h1>";
                    $assunto = "Redefinir a Senha";
                    $headers = "From: meusite@localhost.com".'\r\n'.'X-mailer: PHP/'.phpversion();
                    //mail($email, $assunto, $mensagem, $headers);
                    echo $mensagem; exit;
                }else{
                    $sql_update_token = "UPDATE usuarios_token SET status = 0 WHERE id_usu = :id_usu";
                    $sql_update_token = $pdo->prepare($sql_update_token);
                    $sql_update_token->bindValue(':id_usu', $id_usu);
                    $sql_update_token->execute();
                    echo "<h1>Atenção! O Token foi expirado. Clique <a href='index.php'>aqui</a> para retornar.</h1>"; exit;
                }
            }
        }else{
            echo "<h1>Atenção! Esse email não existe. Clique <a href='cadastrar.php'>aqui</a> para cadastrar.</h1>"; exit;
        }
    }
?>

<form method="POST">
    Email: <br>
    <input type="text" name="email">
    <br>
    <br>
    <input type="submit" value="Enviar">
    <br>
    <br>
    <a href="index.php">Voltar</a>
</form>
