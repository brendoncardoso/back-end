<?php $render('header'); ?>
<h1>Editar Usuário</h1>

<form method="POST" action="">
    <input name="id" value="<?= $usuarios[0]['id']; ?>" hidden>
    <label for="">Nome:</label>
    <input type="text" name="nome" id="" value="<?= $usuarios[0]['nome']; ?>">
    
    <br> 
    <br>

    <label for="">Email</label>
    <input type="email" name="email" id="" value="<?= $usuarios[0]['email']; ?>">
    
    <br> 
    <br>

    <input type="submit" value="Atualizar">
</form>

<?php $render('footer'); ?>