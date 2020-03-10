<?php
    include 'class/Lixeira.class.php';
    $lixeira->lixeira();
    $result = $lixeira->getLixeira();
?>

<style>
    tr{
        text-align: center;
    }
</style>

<h1>Lista de Usuários</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result AS $key => $values) { ?>
            <tr>
                <td><?php echo $values['id']; ?></td>
                <td><?php echo $values['nome']; ?></td>
                <td><?php echo $values['email']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $values['id']; ?>">Editar</a> 
                    - 
                    <?php if($values['status'] == 1) { ?>
                        <a href="excluir.php?id=<?php echo $values['id']; ?>">Excluir</a>
                    <?php } else if($values['status'] == 0) { ?>
                        <a href="reativar.php?id=<?php echo $values['id']; ?>">Reativar</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>