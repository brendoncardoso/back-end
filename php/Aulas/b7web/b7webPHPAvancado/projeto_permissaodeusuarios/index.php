<?php
    session_start();
    include 'class/Db.class.php';
    include 'class/Usuarios.class.php';
    include 'class/Documentos.class.php';
    
    
    if(!isset($_SESSION['logado'])){
        header('location: login.php');
    }
?>

<?php 
    $usuario->setUsuario($_SESSION['logado']);
    $getPermissoes = $usuario->getPermissoes();
    $array = $documentos->getDocumentos();
?>

<style>
    tr {
        text-align: center;
    }
</style>
<h1>Sistema</h1>
<p>Só tem permissão para: <?php echo "<pre>";  print_r($getPermissoes);  echo "</pre>"; ?></p> 

<?php if($usuario->verificaPermissoes('ADD')) { ?>
<a href="">Adicionar</a>
<?php } ?>
<br>
<br>
    <a href="secreto.php">Página Secreta</a>
<br>
<br>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Arquivo</th>
            <th>Ações: </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($array as $key => $values) { ?>
            <tr>
                <td><?php echo $values['id']; ?></td>
                <td><?php echo $values['nome_arquivo']; ?></td>
                <td>
                    <?php if($usuario->verificaPermissoes('UPDATE')) { ?>
                        <a href="editar.php?id=<?php echo $values['id']; ?>">Editar</a>
                    <?php } ?>
                   
                    <?php if($usuario->verificaPermissoes('DELETE')) { ?>
                        <a href="excluir.php?id=<?php echo $values['id']?>">Excluir</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


