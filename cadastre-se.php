<?php require "pages/header.php"; ?>

<div class="container">
    <h1>Cadastre-se</h1>
    <?php

    require "classes/usuarios.class.php";

    $u = new Usuarios();

    if($_POST) {
        foreach($_POST as $chave => $valor) {
            if(empty($valor)) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Favor preencher ".$chave;
                echo "</div>";
                break;
            }
        }
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $telefone = addslashes($_POST['telefone']);
        $senha = addslashes(md5($_POST['senha']));


        if($u->cadastrar($nome, $email, $telefone, $senha)) {
            echo "<div class='alert alert-success'>";
            echo "Usuário Cadastrado com Sucesso! <a href='login.php' class='alert-link'>Faça Login</a> com o seu novo usuário";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Usuário já está cadastrado no sistema!";
            echo "</div>";
        }
    }

    ?>
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail de Acesso</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <small class="form-text text-muted">Não compartilhe seu e-mail com outra pessoa.</small>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn">Cadastrar</button>
    </form>
</div>

<?php require "pages/footer.php"; ?>