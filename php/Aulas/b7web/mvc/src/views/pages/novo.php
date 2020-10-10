<?php $render('header'); ?>
<h1>Novo Usuário</h1>

<form method="POST" action="">
    <label for="">Nome:</label>
    <input type="text" name="nome" id="">
    
    <br> 
    <br>

    <label for="">Email</label>
    <input type="email" name="email" id="">
    
    <br> 
    <br>

    <input type="submit" value="Enviar">
</form>

<?php $render('footer'); ?>