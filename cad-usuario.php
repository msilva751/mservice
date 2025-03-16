<?php
include 'includes/header.php';
include 'menu.php';
//include_once 'includes/mensage.php';
?>
<div class="contanier">
    <div class="controls">
        <h5>Cadastro de Usuário</h5>
    </div>
    <?php if (isset($_SESSION['cpf_invalido'])): ?>
        <script>
            window.onload = function () {
                M.toast({html: '<?php echo "CPF inválido. Verifique e tente novamente"; ?>'});
            };
        </script>
        <?php
    endif;
    unset($_SESSION['cpf_invalido']);
    ?>
    <?php
    if (isset($_SESSION['invalido'])):
        ?>
        <div class="validate">
            <p>CPF inválido, verifique-se e tenta novamente.</p>
        </div>
        <?php
    endif;
    unset($_SESSION['invalido']);
    ?>
    <?php
    if (isset($_SESSION['usuario_existe'])):
        ?>
        <div class="validate">
            <p>CPF já cadastrado, verifique-se e tenta novamente.</p>
        </div>
        <?php
    endif;
    unset($_SESSION['usuario_existe']);
    ?>
    <?php
    if (isset($_SESSION['status_cadastro'])):
        ?>
        <div class="validate-cadastro">
            <p>Cadastro efetuado com sucesso...</p>
            <!-- <p>Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p> -->
        </div>
        <?php
    endif;
    unset($_SESSION['status_cadastro']);
    ?>
    <?php
    if (isset($_SESSION['confirme_senha'])):
        ?>
        <div class="validate">
            <p>Senhas não coincidem, verifique e tente novamente</p>
        </div>
        <?php
    endif;
    unset($_SESSION['confirme_senha']);
    ?>
    <div class="FormCadUusario">
        <form action="add-usuario.php" method="POST">
            <div class="cad-usuario">
                <div class="collummn-01">
                    <label for="cpf_usuario" class="cad-usuario"> CPF do Usuário </label>
                    <input name="cpf_usuario" id="cpf_usuario" type="text" size="20" maxlength="20" class="input-fields" data-mask="000.000.000-00" autofocus="" required="">
                    <label for="nome_usuario" class="cad-usuario"> Nome Completo </label>
                    <input name="nome_usuario" id="nome_usuario" type="text" size="60" maxlength="100" class="input-fields">
                    <label for="email_usuario" class="cad-usuario"> E-mail do Usuário </label>
                    <input name="email_usuario" id="email_usuario" type="email" size="60" maxlength="100" class="input-fields">
                    <label for="nome_loja" class="cad-usuario"> Nome da Loja </label>
                    <input placeholder="Nome da loja" name="nome_loja" id="nome_loja" type="text" size="60" maxlength="100" class="input-fields">
                </div>
                <div class="collumn-02">
                    <label for="login_usuario" class="cad-usuario"> Login do Usuário </label>
                    <input placeholder="Código de 6 digitos" name="login_usuario" id="login_usuario" type="text" size="32" maxlength="32" class="input-fields">
                    <label for="senha_usuario" class="cad-usuario"> Senha </label>
                    <input placeholder="8 digitos" name="senha_usuario" id="senha_usuario" type="password" size="32" maxlength="32"  class="input-fields">
                    <label for="confirm_senha" class="cad-usuario"> Confirmar Senha </label>
                    <input placeholder="Confirme a senha" name="confirm_senha" id="confirm_senha" type="password" size="32" maxlength="32" class="input-fields">
                    <label for="numero_loja" class="cad-usuario"> Loja </label>
                    <input placeholder="Número da loja" name="numero_loja" id="numero_loja" type="text" size="11" maxlength="11" class="input-fields">
                </div>
            </div>
            <button type="submit" name="btn-cad-usuario" class="btn-green-teal-darken-1"> CADASTRAR </button>
            <a href="menu.php" onclose="onclose" class="btn-green-teal-darken-1" name="btn-sair"> SAIR </a>
        </form>
    </div>
</div>
<?php
include ('includes/footer.php');
?>

