<?php
/** 7 principais manipulações de Texto no PHP */

//1. explode
$nome = "Brendon Cardoso";
$explosion = explode(" ", $nome);

echo '<pre>';
    print_r($explosion);
echo '</pre>';

//2. implode
$array = array("Brendon", "Cardoso");
$implosion = implode(" ", $array);
echo '<pre>';
    print_r($implosion);
echo '</pre>';

//3. number_format
$number_format = number_format(241323.2244567, 2, ".", ",");
echo $number_format;

//4. str_replace()
$text = "O rato roeu a cama!";
$replace = str_replace('roeu', 'comeu', $text);
echo $replace;

//5. strtolower();
$text = "BRENDON CARDOSO";
$lower = strtolower($text);
echo $lower;

//6. strtoupper();
$text = "brendon cardoso";
$upper = strtoupper($text);
echo $upper;

//7. substr();
$text = "Brendon";
$subs = substr($text, 0, 3);
echo $subs;

?>