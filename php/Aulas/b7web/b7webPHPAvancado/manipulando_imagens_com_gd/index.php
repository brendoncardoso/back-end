<?php
    $arquivo = "imagem.jpg";

    $largura = "200";
    $altura = "200";

    list($largura_original, $altura_original) = getimagesize($arquivo);

    $imagem_final = imagecreatetruecolor($largura_original, $altura_original);

    $imagem_original = imagecreatefromjpeg($arquivo);

    imagecopy($imagem_final, $imagem_original, 0, 0, 0, 0, $largura_original, $altura_original);

    header("Content-Type: image/jpeg");

    imagejpeg($imagem_final, null, 100)
?>