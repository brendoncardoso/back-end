<?php
    require 'class/Db.class.php';
    require 'class/Reserva.class.php';
    require 'class/Carro.class.php';
    require 'class/Function.class.php';
    require 'class/Calendario.class.php';
?>

<style>
    tr{
      text-align: center;  
    }
</style>

<h1>Lista de Reservas</h1>

<br>
<a href="adicionar_reserva.php">Adicionar Reserva</a>

<a href="calendario.php">Visualizar Calendário</a>
<br><br>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pessoa</th>
            <th>Carro</th>
            <th>Data de Início</th>
            <th>Data do Fim</th>
            <!--<th></th>-->
        </tr>
    </thead>
    <tbody>
        <?php if($numRows > 0) { ?>
            <?php foreach($arrayReserva AS $key => $values) { ?>
                <tr>
                    <td><?php echo $values['id_reserva']; ?></td>
                    <td><?php echo $values['pessoa']; ?></td>
                    <td><?php echo $values['nome_carro']; ?></td>
                    <td><?php echo $function->dateFormat($values['data_ini']); ?></td>
                    <td><?php echo $function->dateFormat($values['data_fim']); ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="4">Nenhum Registro Encontrado.</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

