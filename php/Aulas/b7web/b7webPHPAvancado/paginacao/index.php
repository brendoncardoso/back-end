<?php
    require '../../../../connection_pdo.php';
    
    $sql_count = "SELECT * FROM posts";
    $sql_count = $pdo->prepare($sql_count);
    $sql_count->execute();
    $count_posts = $sql_count->rowCount();
    
    $p = 0;
    $limit = 10;
    $pg = 1;

    if(isset($_GET['p']) && !empty($_GET['p'])){
        $pg = addslashes($_GET['p']);
    }

    $p = ($pg - 1) * $limit;

    $sql = "SELECT * FROM posts LIMIT $p, $limit";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    $dados = $sql->fetchAll();
    $count = $sql->rowCount();

    $paginas = $count_posts/$limit;
?>

<table border="1">
    <thead>
        <tr>
            <th colspan="2">ID</th>
            <th colspan="2">Título</th>
            <th colspan="2">Texto</th>
        </tr>
    </thead>
    <tbody>
        <?php if($count > 0) { ?>
            <?php foreach($dados AS $i => $values) { ?>
                <tr>
                    <td colspan="2" align="center"><?= $values['id']; ?></td>
                    <td colspan="2" align="center"><?= $values['titulo']; ?></td>
                    <td colspan="2" align="center"><?= $values['texto']; ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" align="center">Não há registro nessa tabela.</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<br>

<?php for($x = 0; $x < $paginas; $x++) { ?>
    <a href="./?p=<?=($x + 1);?>">[<?= ($x + 1);?>] </a>
<?php } ?>