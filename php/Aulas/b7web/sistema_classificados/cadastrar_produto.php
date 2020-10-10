<?php 
    require 'config.php';

    require 'class/AnunciosClass.php';
    require 'class/UsuariosClass.php';

    require 'pages/header.php';
    $usuario = new Usuarios();
    $categorias = new Anuncios();
    $arrayCategoria = $categorias->getCategorias();

    $message = "";

    if(isset($_FILES['arquivo']['name']) && !empty($_FILES['arquivo']['name'])){
        $titulo = !empty($_POST['titulo']) ? $_POST['titulo'] : NULL;
        $id_categoria = !empty($_POST['id_categoria']) ? $_POST['id_categoria'] : NULL;
        $descricao = !empty($_POST['descricao']) ? $_POST['descricao'] : NULL;
        $valor = !empty($_POST['valor']) ? $_POST['valor'] : NULL;
        $arquivo = !empty($_FILES['arquivo']['name']) ? $_FILES['arquivo']['name'] : NULL;
        $pasta = "assets/images/";
        $extensoes = array('jpg', 'png', 'gif', 'jpeg');
        $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
        $nome_final = time().".".$extensao;


        if($arquivo){
            if (array_search($extensao, $extensoes) === false) {
                $message .= "
                <div class='alert alert-warning' role='alert'>
                    Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif
                </div>";
            } else {
                if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $pasta . $nome_final)) {
                    // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
                    $categorias->insertAnuncio($_SESSION['id'], $titulo, $id_categoria, $descricao, $valor, $nome_final);
                    $message .= "
                    <div class='alert alert-success' role='alert'>
                        Anúncio cadastrado com Sucesso.
                    </div>";
                } else {
                       $message .= "
                        <div class='alert alert-warning' role='alert'>
                            Não foi possível enviar o arquivo, tente novamente.
                        </div>";
                }
            }
        }
    }
    
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                <h4>Cadastrar Produto</h4>
            </div>
            <div class="col-sm-12">
                <?php echo $message; ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Título:</label>
                        <input type="text" class="form-control" id="" name="titulo" placeholder="Título" required>
                    </div>

                    <div class="form-group">
                        <label for="inputGroupSelect01">Categoria:</label>
                        <select class="custom-select" id="inputGroupSelect01" name="id_categoria" required>
                            <option>Selecione...</option>
                            <?php foreach($arrayCategoria as $key => $values) { ?>
                                <option value="<?= $values['id']; ?>"><?= $values['id']; ?> - <?= $values['nome']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Descrição:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">-</span>
                            </div>
                            <textarea class="form-control" name="descricao" aria-label="With textarea" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Valor:</label>
                        <div class="col-sm-3 p-0">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" name="valor" aria-label="Amount (to the nearest dollar)" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Imagem:</label>
                        <input type="file" class="" id="" name="arquivo" required>
                    </div>

                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
<?php require 'pages/footer.php' ?>