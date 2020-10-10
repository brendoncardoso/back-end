<?php 
    require 'config.php';
    require 'pages/header.php';
    require 'class/UsuariosClass.php';
    $usuario = new Usuarios();

    $message = "";

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = !empty($_POST['nome']) ? $_POST['nome'] : NULL;
        $email = !empty($_POST['email']) ? $_POST['email'] : NULL;
        $telefone = !empty($_POST['telefone']) ? $_POST['telefone'] : NULL;
        $senha = !empty($_POST['senha']) ? $_POST['senha'] : NULL;

        if($nome && $email && $senha){
            if($usuario->cadastrar($nome, $email, $telefone, $senha)){
                $message .= "
                    <div class='alert alert-success' role='alert'>
                        Email cadastrado com Sucesso.
                    </div>";
            }else{
                $message .= "
                    <div class='alert alert-warning' role='alert'>
                        Formulário não preenchido corretamente ou Email já existe.
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
                        <label for="formGroupExampleInput">Nome:</label>
                        <input type="text" class="form-control" id="" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Email:</label>
                        <input type="email" class="form-control" id="" name="email" placeholder="emal@email.com">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Telefone:</label>
                        <input type="text" class="form-control" id="" name="telefone" placeholder="(__) _____-____">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Senha:</label>
                        <input type="password" class="form-control" id="" name="senha" placeholder="Senha">
                    </div>

                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
<?php require 'pages/footer.php' ?>