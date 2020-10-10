<?php 
    require 'config.php';
    require 'class/UsuariosClass.php';  
    require 'class/AnunciosClass.php';  
    require 'pages/header.php';  
    $anuncios = new Anuncios();
    $usuario = new Usuarios();
    $array = $anuncios->getMyAnunciou($_SESSION['id']);
    $arrayCategoria = $anuncios->getCategorias();

    $message = "";

    if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
        $titulo = !empty($_POST['titulo']) ? $_POST['titulo'] : NULL;
        $id_categoria = !empty($_POST['id_categoria']) ? $_POST['id_categoria'] : NULL;
        $descricao = !empty($_POST['descricao']) ? $_POST['descricao'] : NULL;
        $valor = !empty($_POST['valor']) ? $_POST['valor'] : NULL;
        $anuncios->updateAnuncio($_SESSION['id'], $titulo, $id_categoria, $descricao, $valor);

        $message .= "
        <div class='alert alert-success' role='alert'>
            Anúncio atualizado com Sucesso.
        </div>";
    }   
    
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                <h4>Editar Produto</h4>
            </div>
            <div class="col-sm-12">
                <?php echo $message; ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Título:</label>
                        <input type="text" class="form-control" id="" name="titulo" placeholder="Título" value="<?= $array['titulo']?>" required>
                    </div>

                    <div class="form-group">
                        <label for="inputGroupSelect01">Categoria:</label>
                        <select class="custom-select" id="inputGroupSelect01" name="id_categoria" required>
                            <option>Selecione...</option>
                            <?php foreach($arrayCategoria as $key => $values) { ?>
                                <option value="<?= $values['id']; ?>" <?= $values['id'] == $array['id_categoria'] ? 'selected' : ''; ?>><?= $values['id']; ?> - <?= $values['nome']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Descrição:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">-</span>
                            </div>
                            <textarea class="form-control" name="descricao" aria-label="With textarea" required><?= $array['descricao']?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Valor:</label>
                        <div class="col-sm-3 p-0">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" name="valor" value="<?= $array['valor']?>" aria-label="Amount (to the nearest dollar)" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button name="atualizar" type="submit" class="btn btn-success">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
<?php require 'pages/footer.php' ?>