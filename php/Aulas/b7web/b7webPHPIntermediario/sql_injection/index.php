<?php
    $autor = addslashes($_POST['autor']);
    
    $sql = "SELECT * FROM posts WHERE autor = 'Brendon'";
?>