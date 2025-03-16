<?php
include_once 'includes/header.php';
include_once 'menu.php';
include_once 'action/conexao.php';
//echo "<br><br><br><br><br>";

if (isset($_POST['btn_consultar_usuario'])):

    function validaCPF($cpf = await) {
        // Verifica se um número foi informado
        if (empty($cpf)) {
            return true;
        }
        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return true;
        }
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return true;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;

                if ($cpf[$c] != $d) {
                    return true;
                }
            }
            return false;
        }
    }

    if (validaCPF($_POST['cpf_usuario'])) {
        header('Location:consul-usuario.php');
        $_SESSION['cpf_invalid'] = false;
        exit();
    }

    $cpf_usuario = isset($_POST['cpf_usuario']) ? $_POST['cpf_usuario'] : null;
    $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE cpf_usuario = '$cpf_usuario'";
    $resultado = mysqli_query($conexao, $sql);
    $registro = mysqli_fetch_array($resultado);
    var_dump($registro);
    
    if ($registro ['total'] == 0) {
        header('Location:consul-usuario.php');
        $_SESSION['not_found_usr'] = false;
        exit();
    }
endif;
$cpf_usuario = isset($_POST['cpf_usuario']) ? $_POST['cpf_usuario'] : null;
$query = "SELECT * FROM usuarios WHERE cpf_usuario = '$cpf_usuario'";
$result = mysqli_query($conexao, $query);
$dados = mysqli_fetch_assoc($result);
//var_dump($dados);
//endif;
?>
<div class="container">
    <div class="controls">
        <h5>Consultar Usuário</h5>
    </div>
    <div class="alert">
        <?php
        if (isset($_SESSION['not_found_usr'])):
            ?>
            <div class="validate">
                <p>Usuário não cadastrado! Verifique o CPF e tenta novamente</p>
            </div>
            <?php
        endif;
        unset($_SESSION['not_found_usr']);
        ?>
        <?php
        if (isset($_SESSION['nova_senha'])):
            ?>
            <div class="validate">
                <p>Senhas não coincidem. Verifique e tente novamente</p>
            </div>
            <?php
        endif;
        unset($_SESSION['nova_senha']);
        ?>
        <?php
        if (isset($_SESSION['alter_senha'])):
            ?>
            <div class="alter-password">
                <p>Senha alterada com sucesso!</p>
            </div>
            <?php
        endif;
        unset($_SESSION['alter_senha']);
        ?>
        <?php
        if (isset($_SESSION['usuario_excluido'])):
            ?>
            <div class="alter-password">
                <p>Usuário exlcuído com sucesso!</p>
            </div>
            <?php
        endif;
        unset($_SESSION['usuario_excluido']);
        ?>
        <?php
        if (isset($_SESSION['cpf_invalid'])):
            ?>
            <div class="validate">
                <p>CPF inválido. Verifique e tente novamente</p>
            </div>
            <?php
        endif;
        unset($_SESSION['cpf_invalid']);
        ?>
        <div class="FormConsulUsuario">
            <form id="consulUsuario" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="consul-usuario"> 
                    <div class="collumn-01">
                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $dados ['id_usuario'] ?>">
                        <label for="cpf_usuario" class="consul-usuario">CPF do Usuário</label>
                        <input name="cpf_usuario" id="cpf_usuario" value="<?= $dados ['cpf_usuario'] ?>" type="text" size="20" maxlength="20" class="input-fields" data-mask="000.000.000-00" required="">
                        <label for="nome_usuario" class="consul-usuario">Login do Usuário</label>
                        <input name="nome_usuario" id="nome_usuario" value="<?= $dados ['nome_usuario'] ?>" readonly="" type="text" size="60" maxlength="100" class="input-fields">
                        <label for="email_usuario" class="consul-usuario">E-mail do Usuário</label>
                        <input name="email_usuario" id="email_usuario" value="<?= $dados ['email_usuario'] ?>" readonly=""  type="email" size="60" maxlength="100" class="input-fields">
                        <label for="nome_loja" class="consul-usuario">Nome da Loja</label>
                        <input placeholder="" name="nome_loja" id="nome_loja" value="<?php echo $dados['nome_loja']; ?>" readonly="" type="text" size="60" maxlength="100" class="input-fields">
                    </div>
                    <div class="collumn-02">
                        <label class="consul-usuario">Login do Usuário</label>
                        <input placeholder="" name="login_usuario" id="login_usuario" value="<?php echo $dados ['login_usuario']; ?>" readonly="" type="text" size="32" maxlength="32" class="input-fields">
                        <label class="consul-usuario">Senha</label>
                        <input placeholder="" name="senha_usuario" id="senha_usuario" type="password" size="32" maxlength="32"  class="input-fields" disabled="">
                        <label class="consul-usuario">Confirmar Senha</label>
                        <input placeholder="" name="confirm_senha" id="confirm_senha" type="password" size="32" maxlength="32" class="input-fields" disabled="">
                        <label class="consul-usuario">Loja</label>
                        <input placeholder="" name="numero_loja" id="numero_loja" value="<?php echo $dados ['numero_loja']; ?>" readonly="" type="text" size="11" maxlength="11" class="input-fields">
                    </div>	
                </div>
                <button type="submit" name="btn_consultar_usuario" class="btn-green-teal-darken-1"> CONSULTAR </button>
                <a href="edit-usuario.php?id_usuario=<?= $dados['id_usuario']; ?>" name="btn-alterar-senha" class="btn-green-teal-darken-1"> ALTERAR SENHA </a>
                <a href="#del-usuario<?= $dados['id_usuario']; ?>" onclick="document.getElementById('del-usuario<?= $dados['id_usuario']; ?>').style.display = 'block'" class="btn-green-teal-darken-1">EXCLUIR</a>
                <a href="menu.php" onclose="onclose" class="btn-green-teal-darken-1" name="btn-sair">SAIR</a>

                <div id="del-usuario<?= $dados['id_usuario']; ?>" class="ms-modal">
                    <div class="ms-modal-content ms-card ms-animate-zoom">
                        <h4>Opa!</h4>
                        <p>Tem certeza que deseja excluir o usuário</p>
                        <div class="ms-center"><br>
                            <span onclick="document.getElementById('id02<?= $dados['id_usuario']; ?>').style.display = 'none'" class="ms-button ms-xlarge ms-hover-red ms-display-topright" title="Fechar">&times;</span>
                        </div>
                        <div class="ms-footer">
                            <a href="action/delete-usuario.php?id_usuario=<?= $dados['id_usuario']; ?>" class="btn-red-modal-float">SIM, QUERO DELETAR</a>
                            <a href="#!" onclick="document.getElementById('del-usuario<?= $dados['id_usuario']; ?>').style.display = 'none'">CANCELAR</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
mysqli_close($conexao);
include_once 'includes/footer.php';
?>
