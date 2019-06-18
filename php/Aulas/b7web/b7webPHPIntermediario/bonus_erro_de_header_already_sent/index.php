<?php
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = $_POST['nome'];
        if($nome == "Brendon"){
            header("location: paginaliberada.php");
        }else{
            echo 'Acesso Negado!';
        }
    }
?>

<h1>Página 1</h1>
<form action="" method="post">
    <p>Digite "Brendon" no campo de baixo.</p><br>

    <input type="text" name="nome" required><br><br>
    <input type="submit" value="Conferir">
</form>