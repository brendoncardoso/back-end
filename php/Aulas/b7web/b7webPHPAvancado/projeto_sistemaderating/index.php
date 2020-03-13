<?php
    require 'class/Db.class.php';
    require 'class/Filmes.class.php';
?>

<style type="text/css">
    a:link {
        text-decoration:none;
    }
    
    a:visited {
        text-decoration:none;
    }
    
    a:hover {
        text-decoration:none;
    }
</style>

<form method="POST">
    <?php foreach($arrayFilmes AS $key => $values) { ?>
        <fieldset>
            <h5><?php echo $values['nome_filme'] ?></h5>
            <?php for($x = 1; $x <= 5; $x++) { ?>
                <a href="voto.php?id=<?php echo $values['id']; ?>&nota=<?php echo $x; ?>">
                    <img src="star.png"/> 
                </a>
            <?php } ?>
            <h1>Média: (<?php echo $values['media']; ?>)</h1>
        </fieldset>
    <?php } ?>
</form>
