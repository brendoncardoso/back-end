<?php
    session_start();
    require 'config.php';
    if(isset($_SESSION['banco']) && empty($_SESSION['banco']) == false){
        $id = $_SESSION['banco'];

        $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql-> rowCount() > 0){
            $sql = $sql->fetch();
        }

    }else{
        header('location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caixa Eletônico</title>
</head>
<body>
    <h1>Banco XYZ</h1>

    Titular:
    <?php echo $sql['titular']; ?> <br/><br/>

    Agência: 
    <?php echo $sql['agencia']; ?> <br/><br/>
    
    Conta: 
    <?php echo $sql['conta']; ?> <br/><br/>

    Saldo:
    R$ <?php echo $sql['saldo']; ?>,00<br/><br/>

    <a href="sair.php">Sair</a> <br/><br/>

    <hr>

    <h3>Movimentação/Extrato</h3>

    <hr>

    <a href="add_transicao.php">Adicionar Transição</a>
    <br><br>


    <table border="1">
        <tr>
            <th>Data</th>
            <th>Extrato</th>
        </tr>

        <?php
            $sql = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id_conta");
            $sql->bindValue(':id_conta', $id);
            $sql->execute();
        ?>

        <?php if($sql->rowCount() > 0) { ?>
            <?php foreach($sql->fetchAll() as $item) { ?>
                <tr style="text-align: center;">
                    <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])); ?></td>
                    <td>
                        <?php if($item['tipo'] == 0) { ?>
                            <span style="color: green">
                               + R$ <?php echo $item['valor']; ?>,00
                            </span>
                        <?php } else { ?>
                            <span style="color: red">
                               - R$ <?php echo $item['valor']; ?>,00
                            </span>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } else{ ?>
        <?php echo 'não existe'; } ?>
        
    </table>
</body>
</html>