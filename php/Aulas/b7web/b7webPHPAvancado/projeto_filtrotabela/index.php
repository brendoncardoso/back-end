<?php
    include_once 'class/FiltroTabela.class.php';
    $obj_filtrotabela->setSearchGenre($_POST['sexo']);
    $values = $obj_filtrotabela->getArray();
    $getNumRows = $obj_filtrotabela->getNumRows();    
?>

<style>
    tr {
        text-align: center;
     }
</style>

<form method="POST">
    <select name="sexo">
        <option value="-1"><< Selecione >></option>
        <option value="1">Masculino</option>
        <option value="0">Feminino</option>
    </select>
    
    <input type="submit" value="Buscar">
</form>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Idade</th>
        </tr>
    </thead>
    <tbody>
        <?php if($getNumRows > 0) { ?>
            <?php if($_POST['sexo'] != -1) { ?>
                <tr>
                    <td><?php echo $values['id']; ?></td>
                    <td><?php echo $values['nome']; ?></td>
                    <td><?php echo $values['sexo']; ?></td>
                    <td><?php echo $values['idade']; ?></td>
                </tr>
            <?php } else { ?>
                <?php foreach($values AS $key => $values) { ?>
                    <tr>
                        <td><?php echo $values['id']; ?></td>
                        <td><?php echo $values['nome']; ?></td>
                        <td><?php echo $values['sexo']; ?></td>
                        <td><?php echo $values['idade']; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="4">Não há registro nessa tabela</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
