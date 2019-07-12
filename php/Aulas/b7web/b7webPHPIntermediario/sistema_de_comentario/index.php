<?php
    include 'conecte.php';
    try{
        $pdo = new PDO("mysql:dbname=projeto_comentarios;host=localhost", "root", "");
    }
    catch(PDOException $e){
        echo "ERRO: ".$e->getMessage(); 
        exit;
    }

    $sql_select = "SELECT * FROM mensagens ORDER BY data_msg DESC";
    $sql_viwer = $pdo->query($sql_select);

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = $_POST['nome'];
        $mensagem = $_POST['mensagem'];
       

        $sql_insert = $pdo->prepare('INSERT INTO mensagens SET nome= :nome, msg= :msg, data_msg= NOW()');
        $sql_insert->bindValue(':nome', $nome);
        $sql_insert->bindValue(':msg', $mensagem);
        $sql_insert->execute();

        header('location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sistema de Comentários</title>
    </head>
    <body>
        <form action="" method="post">
            <fieldset>
                Nome:
                <input type="text" name="nome" id=""><br/><br/>

                Mensagem:<br/>
                <textarea name="mensagem" id="" cols="30" rows="10"></textarea><br/><br/>

                <input type="submit" name="enviar_mensagem" value="Enviar Mensagem">
            </fieldset>

            <br>

            <?php if($sql_viwer->rowCount() > 0){ ?>
                <?php foreach($sql_viwer->fetchAll() AS $mensagens) { ?>
                    <strong><?php echo $mensagens['nome']?></strong> <small><?php echo $mensagens['data_msg']?></small><br>
                    <p><?php echo $mensagens['msg']?></p>
                    <hr>
                <?php } ?>    
            <?php }else{?>
                <hr>
                <strong>Não existe</strong>
                <hr>
            <?php } ?>
        </form>
    </body>
</html>