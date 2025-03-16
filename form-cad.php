<?php
include_once ('includes/header.php');
include_once ('menu.php');
?>
<div class="container">
    <div class="controls">
        <h5>Formulário de Cadastro de Cliente</h5>
    </div>
    <?php
    if (isset($_SESSION['cpf_invalido'])):
        ?>
        <div class="validate">
            <p>CPF inválido, verifique e tente novamente</p>
        </div>
        <?php
    endif;
    unset($_SESSION['cpf_invalido']);
    ?>
    <?php
    if (isset($_SESSION['cliente_existe'])):
        ?>
        <div class="validate">
            <p>Cliente já cadastrado. Verifique o CPF e tente novamente</p>
        </div>
        <?php
    endif;
    unset($_SESSION['cliente_existe']);
    ?>
    <?php
    if (isset($_SESSION['cadastro'])):
        ?>
        <script>
            window.onload = function () {
                M.toast({html: '<?php echo $_SESSION['cadastro']; ?>'});
            };
        </script>
        <?php
    endif;
    unset($_SESSION['cadastro']);
    ?>
    <!-- Jquery-2.1.1.min.js e Jquery-1.14.10 somente para o campo input CPF ou CNPJ -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery-1.14.10.mask.js"></script>
    <!-- Está funçâo é somente para o campo CPF ou CNPJ -->
    <script>
            var options = {
                onKeyPress: function (cpf, ev, el, op) {
                    var masks = ['000.000.000-000', '00.000.000/0000-00'];
                    $('#cpf_cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                }
            };
            $('#cpf_cnpj').length > 11 ? $('#cpf_cnpj').mask('00.000.000/0000-00', options) : $('#cpf_cnpj').mask('000.000.000-00#', options);
    </script>
    <div class="ScreenCadClient">
        <form action="cad-cliente.php" method="POST">
            <div class="form-cad-client">
                <div class="collumn-01">
                    <label for="cpf_cnpj" class="form-cad-client">CNPJ ou CPF</label>
                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" autofocus="" onkeypress="cpf" class="input-fields" />
                    <label for="insc_estadual" class="form-cad-client">Inscrição Estadual</label>
                    <input type="text" name="insc_estadual" id="insc_estadual" class="input-fields"><br>
                    <label for="nome" class="form-cad-client">Nome do Cliente</label>
                    <input type="text" name="nome" id="nome" size="50" maxlength="100"  class="input-fields"><br>
                    <label for="r_social" class="form-cad-client">Razão Social</label>
                    <input type="text" name="r_social" id="r_social" size="50" maxlength="100"  class="input-fields"><br>
                    <label for="email" class="form-cad-client">E-mail</label>
                    <input type="email" name="email" id="email" size="50" class="input-fields"><br>
                    <label for="tel_fixo" class="form-cad-client">Telefone Fixo</label>
                    <input type="text" name="tel_fixo" id="tel_fixo" size="15" maxlength="15" data-mask="(00) 0000-0000" class="input-fields"><br>
                    <label for="tel_celular" class="form-cad-client"  >Telefone Celular</label>
                    <input type="text" name="tel_celular" id="tel_celular" size="15" maxlength="15" data-mask="(00) 00000-0000" class="input-fields"><br>
                    <label for="referencia" class="form-cad-client">Referência</label>
                    <input type="text" name="referencia" id="referencia" size="50" maxlength="80" class="input-fields"><br>
                </div>
                <div class="collumn-02">
                    <label for="cep" class="form-cad-client">CEP</label>
                    <input type="text" name="cep" id="cep" size="10" data-mask="00000-000" class="input-fields"><br>
                    <label for="endereco" class="form-cad-client">Endereço</label>
                    <input type="text" name="endereco" id="endereco" size="50" maxlength="80" class="input-fields">
                    <label for="numero" class="form-cad-client">Número</label>
                    <input type="text" name="numero" id="numero" size="11" maxlength="11" class="input-fields"><br>
                    <label for="complemento" class="form-cad-client">Complemento</label>
                    <input type="text" name="complemento" id="complemento" size="50" maxlength="50" class="input-fields" placeholder="Exemplos: casa nº, apto andar, outros..."><br>
                    <label for="bairro" class="form-cad-client">Bairro</label>
                    <input type="text" name="bairro" id="bairro" size="50" maxlength="50" class="input-fields">
                    <label for="cidade" class="form-cad-client">Cidade</label>
                    <input type="text" name="cidade" id="cidade" size="30" maxlength="30" class="input-fields">
                    <label for="uf" class="form-cad-client">Estado</label>
                    <input type="text" name="uf" id="uf" size="2" maxlength="2" class="input-fields"><br>
                </div>
            </div>
            <button type="submit" class="btn-green-teal-darken-1" name="btn-cadastrar">CADASTRAR</button>
            <button type="reset" class="btn-green-teal-darken-1" name="btn-limpar">LIMPAR</button>
            <button onclose="onclose" class="btn-green-teal-darken-1" name="btn-sair">SAIR</button>
            <a href="menuSecund.php" class="btn-green-teal-darken-1" name="btn-sair">SAIR</a>
        </form>
    </div>
</div>
<?php
include_once 'includes/footer.php';
