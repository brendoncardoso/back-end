<?php
    $arquivo = "imagem.jpg";
    $altura = "200";
    $largura = "200";

    list($largura_original, $altura_original) = getimagesize($arquivo);

    $ratio = $largura_original / $altura_original; //    (1600 /  900)

    if($largura/$altura > $ratio){ //    200/200 > 1,777
        $largura = $altura * $ratio; // largura = 200 * 1,7 = 340
    }else{
        $altura = $largura / $ratio; // altura = 200 / 1.7 = 117
    }

    echo "Largura original: ".$largura_original." - Altura Original: ".$altura_original."</br>";
    echo "Largura: ".$largura. " e Altura: ".$altura;

    $imagem_final = imagecreatetruecolor($largura, $altura);
    $imagem_original = imagecreatefromjpeg($arquivo);

    imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_original, $altura_original);

    header("Content-Type: image/jpeg");
    imagejpeg($imagem_final, null, 100);
?>
