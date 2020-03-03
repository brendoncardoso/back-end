<?php
    require 'include/header.php';
    include_once 'class/Categoria.class.php';
?>

<a href="cadastrar_categoria.php">Cadastrar Categoria</a><br><br>
<table border="1">
    <thead>
        <tr>
            <td class="text-center">ID</td>
            <td class="text-center">Palavra</td>
            <td class="text-center">Ações</td>
        </tr>
    </thead>
    <tbody>
        
            <?php if($num_rows_selectAll > 0) { ?>
                <?php foreach ($arraySelectAll AS $values) { ?>
                    <tr>
                        <td class="text-center"><?php echo $values['id']; ?></td>
                        <td class="text-center"><?php echo $values['palavra']; ?></td>
                        <td class="text-center"><a href="edit_categoria.php?id=<?php echo $values['id']; ?>">Editar</a> - <a href="delete_categoria.php?id=<?php echo $values['id']; ?>">Excluir</a></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td class="text-center" colspan="3">Não há registro nessa tabela</td>
                </tr>
            <?php } ?>
       
    </tbody>
</table>

