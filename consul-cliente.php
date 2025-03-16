<?php
include_once ('includes/header.php');
include_once ('menu.php');
include_once ('link.php');
//echo "<br><br><br><br>";

if (isset($_POST['btn-consultar'])):

    function validaCPF($cpf = null) {
        // VERIFICA SE UM NÚMERO FOI INFORMADO
        if (empty($cpf)) {
            return true;
        }
        // ELIMINA POSSIVEL MASCARA
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // VERIFICA SE O NUMERO DE DIGITOS INFORMADOS É IGUAL A 11
        if (strlen($cpf) != 11) {
            return true;
        }
        $digitoA = 0;
        $digitoB = 0;
        // CALCULA OS DIGITOS VERIFICADORES PARA VERIFICAR SE O CPF É VÁLIDO
        for ($i = 0, $x = 10; $i <= 8; $i++, $x--) {
            $digitoA += $cpf[$i] * $x;
        }
        for ($i = 0, $x = 11; $i <= 9; $i++, $x--) {
            if (str_repeat($i, 11) == $cpf) {
                return true;
            }
            $digitoB += $cpf[$i] * $x;
        }
        $somaA = (($digitoA % 11) < 2 ) ? 0 : 11 - ($digitoA % 11);
        $somaB = (($digitoB % 11) < 2 ) ? 0 : 11 - ($digitoB % 11);

        if ($somaA != $cpf[9] || $somaB != $cpf[10]) {
            return true;
        }
    }

    // CHAMA A FUNÇÃO VALIDACPF
    if (validaCPF($_POST['cpf_cnpj'])) {
        header('Location:consul-cliente.php');
        $_SESSION['cpf_invalid'] = true;
        exit();
    }

    $cpf_cnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : false;
    $cadastro = "SELECT COUNT(*) AS 'total' from cadastro WHERE cpf_cnpj = '$cpf_cnpj'";
    $busca_cadastro = mysqli_query($link, $cadastro);
    $result = mysqli_fetch_array($busca_cadastro);
    
    if ($result['total'] == 0) {
        header('Location:consul-cliente.php');
        $_SESSION['not_found_client'] = true;
        exit();
    }
endif;

$cpf_cnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : null;
$sql = "SELECT * FROM cadastro WHERE cpf_cnpj = '$cpf_cnpj'";
$result = mysqli_query($link, $sql);
$dados = mysqli_fetch_array($result);
//echo "<br><br><br>";
//echo var_dump($dados); 
?>
<div class="contanier">
    <div class="controls">
        <h5>Consulta de Cadastro de Cliente</h5>
    </div>
    <?php
    if (isset($_SESSION['cpf_invalid'])):
        ?>
        <div class="validate">
            <p>CPF Inválido. Verifique e tente novamente</p>
        </div>
        <?php
    endif;
    unset($_SESSION['cpf_invalid']);
    ?>
    <?php
    if (isset($_SESSION['not_found_client'])):
        ?>
        <div class="validate">
            <p>Cliente não cadastrado. Verifique e tente novamente</p>
        </div>
        <?php
    endif;
    unset($_SESSION['not_found_client']);
    ?>
    <?php
    if (isset($_SESSION['mensagens'])):
        ?>
        <script>
            window.onload = function () {
                M.toast({html: '<?php echo $_SESSION['mensagens']; ?>'});
            };
        </script>
        <?php
    endif;
    unset($_SESSION['mensagens']);
    ?>
    <div class="ScreenConsulClient">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="consul-cliente">
                <div class="collmmn-01">
                    <input type="hidden" name="id_cliente" value="<?= $dados['id_cliente'] ?>">
                    <label for="cpf_cnpj" class="consul-cliente" onclick=""> CNPJ/CPF </label>
                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" value="<?= $dados['cpf_cnpj'] ?>" size="19" maxlength="19" autofocus="" class="input-fields">
                    <label for="insc_estadual" class="consul-cliente"> Inscrição Estadual </label>
                    <input type="text" name="insc_estadual" id="insc_estadual" value="<?= $dados['insc_estadual'] ?>" class="input-fields"><br>
                    <label for="nome" class="consul-cliente"> Nome do Cliente </label>
                    <input type="text" name="nome" id="nome" readonly="" value="<?= $dados['nome'] ?>" size="50" maxlength="100" class="input-fields"/>
                    <label for="r_social" class="consul-cliente"> Razão Social </label>
                    <input type="text" name="r_social" id="r_social" size="50" maxlength="100" readonly="" value="<?= $dados['r_social'] ?>" class="input-fields"><br>
                    <label for="email" class="consul-cliente"> E-mail </label>      
                    <input type="email" name="email" id="email" size="50" readonly="" value="<?= $dados['email'] ?>" class="input-fields"><br>
                    <label for="tel_fixo" class="consul-cliente"> Telefone Fixo </label>
                    <input type="text" name="tel_fixo" id="tel_fixo" readonly="" value="<?= $dados['tel_fixo'] ?>" size="15" maxlength="15" data-mask="(00) 0000-0000" class="input-fields">
                    <label for="tel_celular" class="consul-cliente"> Telefone Celular </label>
                    <input type="text" name="tel_celular" id="tel_celular" readonly="" value="<?= $dados['tel_celular'] ?>" size="15" maxlength="15" data-mask="(00) 00000-0000" class="input-fields"><br>
                    <label for="referencia" class="consul-cliente">Referência</label>
                    <input type="text" name="referencia" id="referencia" readonly="" value="<?= $dados['referencia'] ?>" size="50" maxlength="80" class="input-fields"><br>
                </div>
                <div class="collummn-02">
                    <label for="cep" class="consul-cliente">CEP</label>
                    <input type="text" name="cep" id="cep" size="10" data-mask="00000-000" readonly="" value="<?= $dados['cep'] ?>" class="input-fields"><br>
                    <label for="endereco" class="consul-cliente">Endereço</label>
                    <input type="text" name="endereco" id="endereco" size="50" maxlength="80" readonly="" value="<?= $dados['endereco'] ?>" class="input-fields">
                    <label for="numero" class="consul-cliente">Número</label>
                    <input type="text" name="numero" id="numero" size="11" maxlength="11" readonly="" value="<?= $dados['numero'] ?>" class="input-fields"><br>
                    <label for="complemento" class="consul-cliente">Complemento</label>
                    <input type="text" name="complemento" id="complemento" size="50" maxlength="50" placeholder="Exemplos: casa nº, apto andar, outros..." readonly="" value="<?= $dados ['complemento'] ?>" class="input-fields"><br>
                    <label for="bairro" class="consul-cliente">Bairro</label>
                    <input type="text" name="bairro" id="bairro" size="50" maxlength="50" readonly="" value="<?= $dados['bairro'] ?>" class="input-fields">
                    <label for="cidade" class="consul-cliente">Cidade</label>
                    <input type="text" name="cidade" id="cidade" readonly="" value="<?= $dados['cidade'] ?>" size="30" maxlength="30" class="input-fields">
                    <label for="uf" class="consul-cliente">Estado</label>
                    <input type="text" name="uf" id="uf" readonly="" value="<?= $dados['uf'] ?>" size="2" maxlength="2" class="input-fields">
                </div>
                <div class="collummn-03">
                    <button type="submit" name="btn-consultar" class="btn-green-teal-darken-1"> CONSULTAR </button>
                    <a href="consul-cliente.php?cpf_cnpj=<?= $dados['cpf_cnpj']; ?>" name="btn-novaconsulta" class="btn-green-teal-darken-1"> NOVA CONSULTA </a>
                    <a href="edit-cliente.php?id_cliente=<?= $dados['id_cliente']; ?>" name="edit-cliente" class="btn-green-darken-1"> ALTERAR </a>
                    <a href="menuSecund.php" onclose="onclose" class="btn-green-teal-darken-1" name="btn-sair">SAIR</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- JQUERY-2.1.1.MIN.JS E JQUERY-1.14.10 SOMENTE PARA O CAMPO INPUT CPF OU CNPJ -->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery-1.14.10.mask.js"></script>
<!-- ESTÁ FUNCTION É SOMENTE PARA O CAMPO CPF OU CNPJ -->
<script>
            var options = {
                onKeyPress: function (cpf, ev, el, op) {
                    var masks = ['000.000.000-000', '00.000.000/0000-00'];
                    $('#cpf_cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                }
            };
            $('#cpf_cnpj').length > 11 ? $('#cpf_cnpj').mask('00.000.000/0000-00', options) : $('#cpf_cnpj').mask('000.000.000-00#', options);
</script>
<?php
$link->close();
include_once 'includes/footer.php';
?>