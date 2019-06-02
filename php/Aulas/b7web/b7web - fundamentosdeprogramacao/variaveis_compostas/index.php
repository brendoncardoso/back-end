<?php
    $variaveis = array("Brendon", "Cardoso", 19, "brendoncarvalho22@gmail.com", "Programador PHP", "06/12/1999");

    $variaveistipo2 = array(
        "nome" => "Brendon",
        "sobrenome" => "Cardoso",
        "idade" => 19,
        "email" => "brendoncarvalho22@gmail.com",
        "função" => "Programador Trainee PHP",
        "data de nascimento" => "06/12/1999"
    );

    $variaveistipo3 = array(
        0 => array(
            "nome" => "Brendon",
            "sobrenome" => "Cardoso"
        )
        ,
        1 => array(
            "nome" => "Pedro",
            "sobrenome" => "Vargas"
        )
    );

    $variaveistipo4[] = array(
        "Nome" => "Brendon",
        "Sobrenome" => "Cardoso"
    );
    $variaveistipo4[1] = array(
        "Ano de Nascimento" => "06/12/1999",
        "Ano atual" => 1999
    );

    echo '<pre>';
    print_r($variaveistipo4);
    echo '</pre>';
?>