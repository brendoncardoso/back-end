<?php
    session_start();

    //Gerar sessão
    $_SESSION['fruta'] = "Maçã";
    echo 'O nome da fruta da sessão é: '.$_SESSION['fruta'].'</br></br>';

    //Gerar cookie
    setcookie("nomedocookie", "Fulano de Tal", time()+3600);
    echo 'O nome do Gerador do cookie é: '.$_COOKIE['nomedocookie'];
?>