<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href=""><img src="<?= $base; ?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?= $base; ?>/cadastro">
            <input placeholder="Digite seu Nome Completo" class="input" type="text" name="nome" required/>
            
            <input placeholder="Data de Nascimento" class="input" type="text" name="data_nascimento" id='data_nascimento' required/>
            
            <input placeholder="Digite sua Cidade" class="input" type="text" name="cidade" required/>
            
            <input placeholder="Digite seu E-mail" class="input" type="email" name="email" required/>

            <input placeholder="Digite sua Senha" class="input" type="password" name="password" required/>

            <input class="button" type="submit" value="Cadastrar" />

            <a href="<?= $base; ?>/login">Tem conta? Clique aqui para logar!</a>
        </form>
    </section>
</body>
<script src="http://unpkg.com/imask"></script>
<script>
    IMask(
            document.getElementById('data_nascimento'), {
              mask: '00/00/0000'  
            }
    );
</script>
</html>