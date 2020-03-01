<?php require 'class/historico.class.php';?>

<style>
    td{
        text-align:center;
    }
</style>

<a href="cadastrar.php">Cadastrar</a>
<br>
<br>

<table border="1">
    <thead>
        <th>ID</th>
        <th>IP</th>
        <th>Data de Registro</th>
        <th>Email</th>
        <th>Ações</th>
    </thead>
    
    <tbody>
        <?php if($rowCount > 0) { ?>
            <?php foreach($resultAll AS $key => $values) { ?>
                <tr>
                    <td><?php echo $values['id']; ?></td>
                    <td><?php echo $values['ip']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($values['data_registro'])); ?></td>
                    <td><?php echo $values['email']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $values['id']; ?>">Editar</a> - <a href="excluir.php?id=<?php echo $values['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5" style="text-align: center;">Nenhum registro cadastrado.</td>
            </tr>
        <?php } ?>
    </tbody>
</table>




