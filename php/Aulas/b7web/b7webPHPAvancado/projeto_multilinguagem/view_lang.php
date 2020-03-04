<?php
    require 'include/header.php';
    include_once 'class/Lang.class.php';
?>

<a href="cadastrar_lang.php">Cadastrar Linguagem</a><br><br>
<table border="1">
    <thead>
        <tr>
            <td class="text-center">ID</td>
            <td class="text-center">Nome_Linguagem</td>
            <td class="text-center">Ações</td>
        </tr>
    </thead>
    <tbody>
        <?php if($getNumRows > 0) { ?>
            <?php foreach ($arraySelectAll AS $values) { ?>
                <tr>
                    <td class="text-center"><?php echo $values['id_linguagem']; ?></td>
                    <td class="text-center"><?php echo $values['nome_linguagem']; ?></td>
                    <td class="text-center"><a href="edit_lang.php?id_linguagem=<?php echo $values['id_linguagem']; ?>">Editar</a> - <a href="delete_lang.php?id_linguagem=<?php echo $values['id_linguagem']; ?>">Excluir</a></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td class="text-center" colspan="3">Não há registro nessa tabela</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
