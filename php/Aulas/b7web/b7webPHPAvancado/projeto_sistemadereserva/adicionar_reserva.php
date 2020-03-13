<?php
    require 'class/Db.class.php';
    require 'class/Reserva.class.php';
    require 'class/Carro.class.php';
    require 'class/Function.class.php';
    require 'class/Calendario.class.php';
    
    if(isset($_POST['nome']) && !empty($_POST['nome']) &&
        isset($_POST['carro']) && !empty($_POST['carro']) && 
            isset($_POST['data_ini']) && !empty($_POST['data_ini']) &&
                isset($_POST['data_fim']) && !empty($_POST['data_fim'])){
        
        $pessoa = $_POST['nome'];
        $id_carro = intval($_POST['carro']);
        $data_ini = $_POST['data_ini'];
        $data_fim = $_POST['data_fim'];
        
        $reserva->insertReserva($pessoa, $id_carro, $data_ini, $data_fim);
        header('location: index.php');
    }
?>

<form method="POST">
    Nome: <br>
    <input type="text" name="nome"><br><br>
    
    Carros: <br>
    <select name="carro">
        <option value="-1"> << Selecione >> </option>
        <?php foreach($arrayCarro AS $key => $values) { ?>
            <option value="<?php echo $values['id']; ?>"> <?php echo $values['nome_carro']; ?></option>
        <?php } ?>
    </select><br><br>
    
    Data de Início: <br>
    <input type="date" name="data_ini"><br><br>
    
    Data de Fim: <br>
    <input type="date" name="data_fim"><br><br>
    
    <input type="submit" value="Enviar">
</form>

<a href="index.php">Voltar</a>