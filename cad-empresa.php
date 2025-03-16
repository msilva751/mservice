<?php
include_once 'includes/header.php';
include_once 'menu.php';
?>
<!-- Jquery-2.1.1.min.js e Jquery-1.14.10 somente para o campo input CPF ou CNPJ -->
<script defer src="js/jquery-2.1.1.min.js"></script>
<script defer src="js/jquery-1.14.10.mask.js"></script>
<!-- Está function é somente para o campo CPF ou CNPJ -->
<script>
    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('#cnpj_empresa').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    };
    $('#cnpj_empresa').length > 11 ? $('#cnpj_empresa').mask('00.000.000/0000-00', options) : $('#cnpj_empresa').mask('000.000.000-00#', options);
</script>
<div class="contanier">
    <div class="controls">
        <h5>Cadastrar Empresa</h5>
    </div>
    <div class="FormCadEmpresa">
        <form action="cad-empresa.php" method="POST">
            <div class="cad-empresa">
                <div class="collumn-1">
                    <input type="checkbox" class="input-fields" checked="checked" />
                    <label> Ativo </label>
                    <input type="checkbox" class="input-fields" id="ativo" checked="checked" />
                    <label for="ativo"> Produto Rural </label><br>
                </div>
                <div class="collumn-2">
                    <label for="fil_empresa" class="cad-empresa"> Filial </label>
                    <input type="text" name="fil_empresa" id="fil_empresa" size="11" maxlength="11" required="" class="input-fields" />
                    <label for="cnpj_empresa" class="cad-empresa"> CGC / CNPJ </label>
                    <input type="text" name="cnpj_empresa" id="cnpj_empresa" size="20" maxlength="18" required="" class="input-fields" />
                    <label for="i_estadual" class="cad-empresa"> Inscrição Estadual </label>
                    <input type="text" name="i_estadual" id="i_estadual" size="20" maxlength="18" required="" class="input-fields" />
                </div>
                <div class="collumn-3">
                    <label for="nome_fantasia" class="cad-empresa"> Nome Empresa </label>
                    <input type="text" name="nome_empresa" id="nome_fantasia" size="60" maxlength="100" required="" class="input-fields" />
                    <label for="nome_empresa" class="cad-empresa"> Nome Fantasia </label>
                    <input type="text" name="nome_empresa" id="nome_empresa" size="60" maxlength="100" required="" class="input-fields" />
                </div>
            </div>
            <button type="submit" class="btn-green-teal-darken-1" id="btn-cadastrar" name="btn-cadastrar"> SALVAR </button>
            <a href="menu.php" onclose="onclose" class="btn-green-teal-darken-1" name="btn-sair"> SAIR </a>

            <div class="end-empres">
                <ul id="tabs-swipe-demo" class="tabs">
                    <li class="tab col s3"><a class="active" href="#test-swipe-1">Dados Gerais</a></li>
                    <li class="tab col s3"><a class="active" href="#test-swipe-2">Endereço Fiscal/Entrega</a></li>
                    <li class="tab col s3"><a class="active" href="#test-swipe-3">Endereço Cobrança</a></li>
                </ul>
            </div>
            <div id="test-swipe-1" class="cad-empresa">
                <label for="end_empresa" class="cad-empresa"> Endereço </label>
                <input type="text" name="end_empresa" id="end_empresa" size="60" maxlength="100" required="" class="input-fields" />
                <label for="n_empresa" class="cad-empresa"> Número </label>
                <input type="text" name="n_empresa" id="n_empresa" size="11" maxlength="11" required="" class="input-fields" />
                <label for="b_empresa" class="cad-empresa"> Bairro </label>
                <input type="text" name="b_empresa" id="b_empresa" size="60" maxlength="100" required="" class="input-fields" />
                <label for="cid_empresa" class="cad-empresa"> Cidade </label>
                <input type="text" name="cid_empresa" id="cid_empresa" size="30" maxlength="30" required="" class="input-fields" />
                <label for="uf_empresa" class="cad-empresa"> UF </label>
                <input type="text" name="uf_empresa" id="uf_empresa" size="2" maxlength="2" required="" class="input-fields" />
            </div> 
            <div id="test-swipe-2" class="cad-empresa">
                <label for="email_filial" class="cad-empresa"> E-mail </label>
                <input type="text" name="email_filial" id="email_filial" size="50" maxlength="100" required="" class="input-fields" />
                <label for="f_empresa" class="cad-empresa"> Telefone Fixo </label>
                <input type="text" placeholder="DDD" name="f_empresa" id="f_empresa" size="15" maxlength="15" data-mask="(00) 0000-0000" class="input-fields" />
                <label for="cel_empresa"  class="cad-empresa"> Telefone Celular </label>
                <input type="text" placeholder="DDD" name="cel_empresa" id="cel_empresa" size="15" maxlength="15" data-mask="(00) 00000-0000" class="input-fields" />
                <label for="manager" class="cad-empresa"> Gerente </label>
                <input type="text" name="manager" id="manager" size="30" maxlength="30" required="" class="input-fields" />
                <label for="complemento" class="cad-empresa"> Complemento </label>
                <input type="text" name="complemento" id="complemento" size="50" maxlength="30" required="" class="input-fields" />
            </div>
            <div id="test-swipe-3" class="col s12 green">Endereço Cobrança</div>  
        </form>
    </div>
</div>
<?php
include 'includes/footer.php';
