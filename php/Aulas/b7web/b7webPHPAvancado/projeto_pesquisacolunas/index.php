<?php
    include_once 'class/PesquisaColunas.class.php';
    
    if(isset($_POST['busca']) && !empty($_POST['busca'])){
        $busca = $_POST['busca'];
        $obj_PesquisaColunas->setSearch($busca);
    }
    
    $getValues = $obj_PesquisaColunas->getArray();
    $getNumRows = $obj_PesquisaColunas->getNumRows();
?>

<h1>Digite um Email ou CPF:</h1> <br>
<form method="POST">
    <input name="busca" value=""><br></br>
    
    <input type="submit" value="Buscar">
</form>
<hr>

<?php if(isset($_POST['busca']) && !empty($_POST['busca'])) { ?>
    <?php if($getNumRows > 0) { ?>
            ID: <?php echo $getValues['id']; ?> <br>
            Nome: <?php  echo $getValues['nome']; ?> <br>
            Email: <?php echo $getValues['email']; ?> <br>
            CPF: <?php  echo $getValues['cpf']; ?> <br>
            Idade: <?php  echo $getValues['idade']; ?> 
    <?php } else { ?>
            Email/CPF não existe.
    <?php } ?>
<?php } ?>
