<?php 
    require 'config.php';
    require 'class/AnunciosClass.php';  
    require 'pages/header.php';  
    $anuncios = new Anuncios();
    $array = $anuncios->getMyAnuncious($_SESSION['id']);
?>

    <div class="container mt-3">
        <h1>Meus Produtos</h1>
        <br>
        
        <a href="cadastrar_produto.php">
            <button type="button" class="btn btn-success" style="float: right;">Cadastrar Produto</button>
        </a>
      
        <br>
        <br>
        <?php if(empty($array)) { ?>
            <div class="alert alert-warning" role="alert">
                Nenhum produto foi cadastrado.
            </div>
        <?php } else { ?>
            <table class="table table-bordered mt-3 text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($array as $values) { ?>
                        <tr>
                            <th scope="row"><?= $values['id']?></th>
                            <td><?= $values['nome_categoria']?></td>
                            <td>
                                <a href="assets/images/<?= $values['url']; ?>" target="_blank">
                                    <img class="img-thumbnail" src="assets/images/<?= $values['url']; ?>" style="height: 150px;">
                                </a>
                            </td>
                            <td><?= $values['titulo']?></td>
                            <td><?= $values['descricao']?></td>
                            <td>R$ <?= number_format($values['valor'], 2); ?></td>
                            <td>
                                <a href="editar_produto.php?id=<?= $values['id']; ?>">
                                    <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                </a>
                                <a href="excluir_produto.php?id=<?= $values['id']; ?>">
                                    <button type="button" class="btn btn-danger btn-sm">Excluir</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 
        <?php } ?>
    </div>