<?php
include_once 'includes/header.php';
include_once 'menu.php';
include_once 'link.php';
//echo '<br><br><br><br><br><br>';
if (isset($_GET['id_cliente'])):
    $id_cliente = mysqli_escape_string($link, $_GET['id_cliente']);
    $sql = "SELECT * FROM cadastro WHERE id_cliente = '$id_cliente'";
    $resultado = mysqli_query($link, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>
<script>
    $(document).ready(function () {
        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#endereco").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }
        //Quando o campo cep perde o foco.
        $("#cep").blur(function () {
            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');
            //Verifica se campo cep possui valor informado.
            if (cep !== "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
                //Valida o formato do CEP.
                if (validacep.test(cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#endereco").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");
                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#endereco").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>
<div class="contanier">
    <div class="controls">
        <h5>Atualizar Cadastro do Cliente</h5>
    </div>
    <div class="ScreenEditClient">
    <form action="atua-cliente.php" method="post">
        <div class="edit-client">
            <div class="collumn-01">
                <input type="hidden" name="id_cliente" value="<?php echo $dados ['id_cliente'] ?>">
                <label for="cpf_cnpj" class="edit-client">CPF ou CNPJ</label>
                <input type="text" name="cpf_cnpj" id="cpf_cnpj" value="<?php echo $dados ['cpf_cnpj'] ?>" size="19" maxlength="19" data-mask="000.000.000-00" readonly="" class="input-fields" /><br>
                <label for="insc_estadual" class="edit-client">Inscrição Estadual</label>
                <input type="text" name="insc_estadual" id="insc_estadual" value="<?php echo $dados ['insc_estadual'] ?>" size="19" maxlength="19" data-mask="000.000.000-00" class="input-fields" /><br>
                <label for="nome" class="edit-client">Nome do Cliente</label>
                <input type="text" name="nome" id="nome" value="<?php echo $dados ['nome'] ?>" size="50" maxlength="100" class="input-fields" /><br>
                <label for="r_social" class="edit-client">Razão Social</label>
                <input type="text" name="r_social" id="r_social" size="50" maxlength="100"  value="<?= $dados ['r_social'] ?>" class="input-fields"><br>
                <label for="email" class="edit-client">E-mail</label>
                <input type="email" name="email" id="email" size="60" value="<?= $dados ['email'] ?>" class="input-fields"><br>
                <label for="tel_fixo" class="edit-client">Telefone Fixo</label>
                <input type="text" name="tel_fixo" id="tel_fixo" value="<?= $dados ['tel_fixo'] ?>" size="15" maxlength="15" data-mask="(00) 0000-0000" class="input-fields"><br>
                <label for="tel_celular" class="edit-client">Telefone Celular</label>
                <input type="text" name="tel_celular" id="tel_celular" value="<?= $dados ['tel_celular'] ?>" size="15" maxlength="15" data-mask="(00) 00000-0000" class="input-fields"><br>
                <label for="referencia" class="edit-client">Referência</label>
                <input type="text" name="referencia" id="referencia" value="<?= $dados ['referencia'] ?>" size="50" maxlength="80" class="input-fields"><br>
            </div>
            <div class="collumn-02">
                <label for="cep" class="edit-client">CEP</label>
                <input type="text" name="cep" id="cep" size="10" data-mask="00000-000" value="<?= $dados ['cep'] ?>" class="input-fields"><br>
                <label for="endereco" class="edit-client">Endereço</label>
                <input type="text" name="endereco" id="endereco" size="80" maxlength="80"  value="<?= $dados ['endereco'] ?>" class="input-fields"><br>
                <label for="numero" class="edit-client">Número</label>
                <input type="text" name="numero" id="numero" size="11" maxlength="11" value="<?= $dados ['numero'] ?>" class="input-fields"><br>
                <label for="complemento" class="edit-client">Complemento</label>
                <input type="text" name="complemento" id="complemento" size="50" maxlength="50" placeholder="Exemplos: casa nº, apto andar, outros..." value="<?= $dados ['complemento'] ?>" class="input-fields"><br>
                <label for="bairro" class="edit-client">Bairro</label>
                <input type="text" name="bairro" id="bairro" size="50" maxlength="50" value="<?= $dados['bairro'] ?>" class="input-fields"><br>
                <label for="cidade" class="edit-client">Cidade</label>
                <input type="text" name="cidade" id="cidade" value="<?= $dados ['cidade'] ?>" size="30" maxlength="30" class="input-fields"><br>
                <label for="uf" class="edit-client">Estado</label>
                <input type="text" name="uf" id="uf" value="<?= $dados ['uf'] ?>" size="2" maxlength="2" class="input-fields"><br>
            </div>
        </div>
        <button type="submit" name="btn-atualizar" class="btn-green-darken-1"> ALTERAR </button>
        <a href="menu.php" name="btn-cancelar" class="btn red"> CANCELAR </a>
    </form>
</div>
<?php
mysqli_close($link);
include_once 'includes/footer.php';
?>
