<?php $render('header'); ?>

<a href="http://des.curso.net/b7web%20-%20PHP/mvc/public/novo">Adicionar Usuário</a>
<hr>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ação</th>
        </thead>
        <tbody>
            <?php foreach($array as $key => $values) { ?>
                <tr>
                    <td><?=$values['id']; ?></td>
                    <td><?=$values['nome']; ?></td>
                    <td><?=$values['email']; ?></td>
                    <td>
                        <a href="http://des.curso.net/b7web%20-%20PHP/mvc/public/usuario/<?= $values['id']; ?>/editar">[Editar]</a>
                        <a href="http://des.curso.net/b7web%20-%20PHP/mvc/public/usuario/<?= $values['id']; ?>/deletar">[Excluir]</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<hr>
<?php $render('footer'); ?>