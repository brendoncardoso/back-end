<?php 
    require 'config.php';
    require 'pages/header.php';
    require 'class/UsuariosClass.php';
    require 'class/AnunciosClass.php';

    $usuarios = new Usuarios();
    $rowCountUsuarios = $usuarios->rowCountUsuarios();

    $anuncios = new Anuncios();
    $rowCountAnuncios = $anuncios->rowCountAnuncios();

    if(!isset($_SESSION['id']) && empty($_SESSION['id'])){
        header('location:cadastrar.php');
    }
?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-5">Mais de <?= $rowCountAnuncios; ?> produtos cadastrados na nossa plataforma</h1>
            <p class="lead">E mais de <?= $rowCountUsuarios; ?> usuários cadastrados no nosso site. :)</p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <h5>Pesquisa Avançada</h5>
            </div>
            <div class="col-sm-9">
                <h5>Últimos Produtos</h5>
            </div>
        </div>
    </div>

<?php require 'pages/footer.php' ?>