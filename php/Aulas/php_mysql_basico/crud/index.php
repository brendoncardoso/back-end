<?php
    $conn = require ('connection.php');
    $result = $conn->query('SELECT * FROM users');
    $users = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user):?>
                <tr>
                    <td><?php echo $user['id']?></td>
                    <td><?php echo $user['email']?></td>
                    <td>
                        <a href="visualizar.php?id=<?php echo $user['id']?>">Visualizar</a>
                        <a href="editar.php?id=<?php echo $user['id']?>">Editar</a>
                        <a href="remover.php?id=<?php echo $user['id']?>">Remover</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><a href="adicionar.php">Adicionar</a></p>
</body>
</html>