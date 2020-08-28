<?php
    require 'TempoClass.php';
    $tempo = new Tempo('2020-08-28');
    echo "A diferença entre as duas datas são: ".$tempo->diferenca()." dias";

?>