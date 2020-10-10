<?php 
    require 'config.php';
    require 'pages/header.php';
    require 'class/UsuariosClass.php';
    $usuario = new Usuarios();

    $message = "";

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = !empty($_POST['email']) ? $_POST['email'] : NULL;
        $senha = !empty($_POST['senha']) ? $_POST['senha'] : NULL;

        if($email && $senha){
            if(!$usuario->login($email, $senha)){
                $message .= "
                    <div class='alert alert-warning' role='alert'>
                        Formulário não preenchido corretamente ou Email não existe.
                    </div>";
            }
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                <h4>Cadastrar</h4>
            </div>
            <div class="col-sm-12">
                <?php echo $message; ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Email:</label>
                        <input type="email" class="form-control" id="" name="email" placeholder="emal@email.com">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Senha:</label>
                        <input type="password" class="form-control" id="" name="senha" placeholder="Senha">
                    </div>

                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </div>
<?php require 'pages/footer.php' ?>