<?php
    require 'config.php';

?>
<style>
    th, td {
        text-align: center;
    }
</style>
 
<?php 
    if(isset($_GET['ordem']) && !empty($_GET['ordem'])){
        $ordem = $_GET['ordem'];
        $sql = "SELECT * FROM usuarios ORDER BY " .$ordem;
        $sql = $pdo->query($sql);
    }else{
        $ordem = '';
        $sql = "SELECT * FROM usuarios";
        $sql = $pdo->query($sql);
    }
?>
<form  method="get">
    <select name="ordem" onchange="this.form.submit();">
        <option value=""></option>
        <option value="id"<?php echo ($ordem=="id")?'selected="selected"':''?>>Pelo id</option>
        <option value="nome"<?php echo ($ordem=="nome")?'selected="selected"':''?>>Pelo nome</option>
        <option value="idade"<?php echo ($ordem=="idade")?'selected="selected"':''?>>Pela idade</option>
    </select>
</form>

<table border="1" width="50%">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Idade</th>
    </tr>

    <?php if($sql->rowCount() > 0){ ?>
        <?php foreach($sql->fetchAll() as $usuario) { ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['idade']; ?></td>
            </tr>
        <?php } ?> 
    <?php } ?>

</table>