<?php
include_once 'includes/header.php';
include_once 'menu.php';
include_once 'action/conexao.php';
?>
<div class="contanier">
    <div class="controls">
        <h5>Alterar Senha do Usuário</h5>
    </div>
    <?php
    if (isset($_GET['id_usuario'])):

        $id_usuario = mysqli_escape_string($conexao, $_GET['id_usuario']);

        $query = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario';";
        $result = mysqli_query($conexao, $query);
        $dados = mysqli_fetch_array($result);
        ?>
        <div class="TelaEditUsuario">
            <form action="alter-password.php" method="POST">
                <div class="edit-usuario">
                    <div class="collummn-01">
                        <label for="cpf_usuario" class="edit-usuario">CPF do usuário</label>
                        <input name="cpf_usuario" id="cpf_usuario" value="<?= $dados ['cpf_usuario'] ?>" readonly=""  type="text" size="20" maxlength="20"  class="input-fields" data-mask="000.000.000-00" required=""><br>
                        <label for="nome_usuario" class="edit-usuario">Nome do Usuário</label>
                        <input  name="nome_usuario" id="nome_usuario" value="<?= $dados ['nome_usuario'] ?>" readonly="" type="text" size="60" maxlength="100"  class="input-fields"><br>
                        <label for="email_usuario" class="edit-usuario">E-mail do Usuário</label>
                        <input name="email_usuario" id="email_usuario" value="<?= $dados ['email_usuario'] ?>" readonly="" type="email" size="60" maxlength="100"  class="input-fields"><br>
                        <label for="nome_loja" class="edit-usuario">Nome da Loja</label>
                        <input placeholder="" name="nome_loja" id="nome_loja" value="<?php echo $dados['nome_loja']; ?>" readonly=""  type="text" size="60" maxlength="100" class="input-fields"><br>
                    </div>
                    <div class="collummn-02">
                        <label for="login_usuario" class="edit-usuario">Login do Usuário</label>
                        <input placeholder="" name="login_usuario" id="login_usuario" value="<?php echo $dados ['login_usuario']; ?>" readonly="" type="text" size="32" maxlength="32"  class="input-fields"><br>
                        <label for="nova_senha" class="edit-usuario">Nova Senha</label>
                        <input placeholder="" name="senha_usuario" id="nova_senha" type="password" size="32" maxlength="32"  autofocus=""  class="input-fields"><br>
                        <label for="confirm_senha" class="edit-usuario">Confirmar Senha</label>
                        <input placeholder="" name="confirm_senha" id="confirm_senha" type="password" size="32" maxlength="32"  class="input-fields"><br>
                        <label for="numero_loja" class="edit-usuario">Loja</label>
                        <input placeholder="" name="numero_loja" id="numero_loja" value="<?php echo $dados ['numero_loja']; ?>" readonly="" type="text" size="11" maxlength="11"  class="input-fields"><br>
                        
                    </div>
                </div>
                <button type="submit" name="btn-alter-senha" class="btn-green-teal-darken-1"> ALTERAR SENHA </button>
                <a href="menu.php" onclose="onclose" class="btn-green-teal-darken-1" name="btn-sair"> SAIR </a>
            </form>
        </div>
    </div>
    <?php
endif;
mysqli_close($conexao);
include_once 'includes/footer.php';
?>

