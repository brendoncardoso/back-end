<?php
    require 'config.php';
?>
<style>
    th,td{
        text-align:center;
    }
</style>
<a href="adicionar.php">Adicionar usuário</a>
<table border=0 width="100%">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <tr>
        <?php
            $sql = "SELECT * FROM usuarios";
            $sql = $pdo->query($sql);
        ?>
        <?php if($sql->rowCount() > 0) { ?>
            <?php foreach($sql->fetchAll() AS $usuario) { ?>
            <tr>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $usuario['id'];?>">Editar</a>
                    <a href="excluir.php?id=<?php echo $usuario['id'];?>">Excluir</a>
                </td>
            </tr>
            <?php } ?>
        <?php } ?>
    </tr>
</table>

 