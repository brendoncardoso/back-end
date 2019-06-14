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
$array = array (
    "nome" => "Brendon", 
    "idade" => 19,
);

$array2 = asort($array);
echo '<pre>';
print_r($array2);
echo '</pre>';

//6. arsoft
$array = array (
    "nome" => "Brendon", 
    "idade" => 19,
);

$array2 = arsort($array);
echo '<pre>';
print_r($array2);
echo '</pre>';

//7. count

$array = array (
    "nome" => "Brendon", 
    "idade" => 19,
);

$array2 = count($array);
echo '<pre>';
print_r($array2);
echo '</pre>';
//8. in_array


?>