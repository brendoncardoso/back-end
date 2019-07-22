<?php

    $array = array(
        1, 2, 5, 3, 2, 7, 9
    );

    $arrayNoRepeat = array_unique($array);

    echo '<pre>';
    print_r($arrayNoRepeat);
    echo '</pre>';
?>
