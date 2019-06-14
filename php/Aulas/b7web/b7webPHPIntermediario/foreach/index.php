<?php
    //$nomes = array ("Brendon", "Yago", "Pedro", "João");

    /////////////////////////////////////////////////////////// 

    $nomes = array(
            "nome" => "Brendon", 
            "idade" => 19
    );

    echo '<pre>';
    print_r($nomes);
    echo '</pre>';

    foreach($nomes AS $dado => $nome){
        echo $nome. '</br>';
    }

    /////////////////////////////////////////////////////////// 



    //Tempo de Paralisação do Vídeo: 07:32
?>