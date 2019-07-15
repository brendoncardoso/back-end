<?php
    session_start();
    require 'config.php';

    if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        $valor = str_replace("," , ".", $_POST['valor']);
        $valor = floatval($valor);


        $sql = $pdo->prepare("INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW())");
        $sql->bindValue(":id_conta", $_SESSION['banco']);
        $sql->bindValue(":tipo", $tipo);
        $sql->bindValue(":valor", $valor);
        $sql->execute();


        if($tipo == '0'){
            //Depósito
            $sql = $pdo->prepare("UPDATE contas SET saldo = saldo + :valor WHERE id = :id");
            $sql->bindValue(':valor', $valor);
            $sql->bindValue(':id', $_SESSION['banco']);
            $sql->execute();
        }else{
            //Saque
            $sql = $pdo->prepare("UPDATE contas SET saldo = saldo - :valor WHERE id = :id");
            $sql->bindValue(':valor', $valor);
            $sql->bindValue(':id', $_SESSION['banco']);
            $sql->execute();
        }

        header('location: index.php');
        exit;
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Transição</title>
</head>
<body>
    <form action="" method="post">
        <select name="tipo">
            <option selected></option>
            <option value="0">Depósito</option>
            <option value="1">Saque</option>
        </select>

        <br><br>

        Valor:
        <input type="text" name="valor" pattern="[0-9.,]{1,}"><br><br>

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>