<?php

    /*
    * ATENÇÃO! ESTUDAR PARA FAZER CALENDÁRIO
    */
    require 'class/Db.class.php';
    require 'class/Reserva.class.php';
    require 'class/Carro.class.php';
    require 'class/Function.class.php';
    require 'class/Calendario.class.php';
?>

<h1>Calendário</h1>

<?php
    if(isset($_POST['ano']) && !empty($_POST['ano']) && $_POST['ano'] != -1 &&
        isset($_POST['mes']) && !empty($_POST['mes']) && $_POST['mes'] != -1){  
        
        $ano = intval($_POST['ano']);
        $mes = intval($_POST['mes']);
        $data = "$ano-".str_pad($mes, 2, '0', STR_PAD_LEFT);
           
        $primeiro_dia = date('w', strtotime($data));

        // t retorna a quantidade de dias do mês.
        $dia_da_semana = date('t', strtotime($data));

        $linhas = ceil(($primeiro_dia + $dia_da_semana) / 7);
        $primeiro_dia = -$primeiro_dia;

        $data_inicio = date('Y-m-d', strtotime($primeiro_dia. 'days', strtotime($data)));
        $data_fim = date('Y-m-d', strtotime((($primeiro_dia + ($linhas * 7) - 1)).'days', strtotime($data)));
    }
?>
<style>
    tr{
        text-align: center;
    }
</style>

<form method="POST">
    <select name="ano">
        <option value="-1"><< Selecione o Mês >></option>
        <?php for($ano = 2000; $ano <= date('Y'); $ano++) { ?>
            <option value="<?= $ano; ?>" <?= $_REQUEST['ano'] == $ano ? 'selected': ''?>><?= $ano; ?></option>
        <?php } ?>
    </select>

    <select name="mes">
        <option value="-1"><< Selecione o Ano >></option>
        <?php for($mes = 1; $mes <= 12; $mes++) { ?>
            <option value="<?= $mes; ?>"<?= $_REQUEST['mes'] == $mes ? 'selected': ''?>><?= $mes; ?></option>
        <?php } ?>
    </select>

    <input type="submit" value="Buscar">
</form>

<?php
    if(isset($_POST['ano']) && !empty($_POST['ano']) && $_POST['ano'] != -1 &&
        isset($_POST['mes']) && !empty($_POST['mes']) && $_POST['mes'] != -1){ ?>
    <table border="1" width="100%">
        <thead>
            <tr>
                <?php foreach($dias_da_semana as $key => $dias) { ?>
                    <th><?php echo $function->weekFormat($dias); ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php for($l = 0; $l <= $linhas; $l++) { ?>
                <tr>
                    <?php for($q = 0; $q < 7; $q++) { ?>
                        <?php $w = date('d', strtotime(($q + ($l*7)) .'days', strtotime($data_inicio))); ?>
                        <td><?php echo $w; ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>