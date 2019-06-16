<?php
//1. array_keys
$array = array (
    "nome" => "Brendon", 
    "idade" => 19,
);

$array2 = array_keys($array);
echo '<pre>';
print_r($array2);
echo '</pre>';

//2. array_values
$array = array (
    "nome" => "Brendon", 
    "idade" => 19,
);

$array2 = array_values($array);
echo '<pre>';
print_r($array2);
echo '</pre>';

//3. array_pop
$array = array (
    "nome" => "Brendon", 
    "idade" => 19,
);

$array2 = array_pop($array);
echo '<pre>';
    print_r($array2);
echo '</pre>';

//4. array_shift
$array = array (
    "nome" => "Brendon", 
    "idade" => 19,
);

$array2 = array_shift($array);
echo '<pre>';
    print_r($array2);
echo '</pre>';

//5. asort
$array = array ("Brendon", "Fernanda", "Diego");

asort($array);
echo '<pre>';
    print_r($array);
echo '</pre>';

//6. arsoft
$array = array ("Brendon", "Fernanda", "Diego");

arsort($array);
echo '<pre>';
    print_r($array);
echo '</pre>';

//7. count
$array = array("Brendon", "Fernanda", "Diego");
echo 'Total de registro, é de: '. count($array).'</br></br>';

//8. in_array
$array = array("Brendon", "Fernanda", "Diego");

if(in_array("Brendon", $array)){
    echo 'Ok, esse nome existe dentro da array.';
}else{
    echo 'Não existe.';
}

?>