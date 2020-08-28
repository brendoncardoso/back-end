<?php 
    require 'PessoaClass.php';

    $pessoa = new Pessoa('Brendon', '1999-12-06');
    echo "Nome: ".$pessoa->getNome()."</br>";
    echo "Idade: ".$pessoa->getIdade()."</br>";
?>