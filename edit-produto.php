<?php
include_once 'includes/header.php';
include_once 'menu.php';
include_once 'link.php';
?>
<div class="contanier">
    <div class="controls">
        <h5>Alteração de Produtos</h5>
    </div>
    <div class="ScreenEditProduto">
        <form action="" method="">
            <div class="edit-produto">
                <div class="collumn-1">
                    <label for="cod_produto" class="edit-produto"> Código produto </label>
                    <input class="input-fields" name="cod_produto" id="cod_produto" size="20" maxlength="21" type="text">
                    <label for="nome_produto" class="edit-produto"> Nome do produto </label>
                    <input class="input-fields" name="nome_produto" id="nome_produto" size="40" maxlength="50" type="text">
                    <label for="date_cadastro" class="edit-produto"> Data Cadastro </label>
                    <input class="input-fields" name="date_cadastro" id="date_cadastro" size="20" type="date">
                    <label for="desc_produto" class="edit-produto"> Descrição do produto </label>
                    <input class="input-fields" name="desc_produto" id="desc_produto" size="40" maxlength="80" type="text">
                    <label for="lote" class="edit-produto"> Lote </label>
                    <input class="input-fields" name="lote" id="lote" size="20" maxlength="80" type="text">
                    <label for="cor_produto" class="edit-produto"> Cor </label>
                    <input class="input-fields" name="cor_produto" id="cor_produto" size="30" maxlength="50" type="text">
                    <label for="q_produto" class="edit-produto"> Quantidade </label>
                    <input class="input-fields" name="q_produto" id="q_produto" size="20" maxlength="20" type="text">
                </div>
                <div class="collumn-2">
                    <label for="esp_produto" class="edit-produto"> Especie </label>
                    <input class="input-fields" name="esp_produto" id="esp_produto" size="20" maxlength="20" type="text">
                    <label for="vlr_unitario" class="edit-produto"> Valor Unitário </label>
                    <input class="input-fields" name="vlr_unitario" id="vlr_unitario" size="20" maxlength="11" type="text">
                    <label for="vlr_venda" class="edit-produto"> Preço de Venda </label>
                    <input class="input-fields" name="vlr_venda" id="vlr_venda" size="20" maxlength="11" type="text">
                    <label for="vlr_total_prod" class="edit-produto"> Valor Total Produto </label>
                    <input class="input-fields" name="vlr_total_prod" id="vlr_total_prod" size="20" maxlength="11" type="text">
                    <label for="vlr_total_nf" class="edit-produto"> Valor Total da Nota </label>
                    <input class="input-fields" name="vlr_total_nf" id="vlr_total_nf" size="20" maxlength="11" type="text">
                    <label for="fornecedor" class="edit-produto"> Fornecedor </label>
                    <input class="input-fields" name="vlr_total_prod" id="fornecedor" size="40" maxlength="60" type="text">
                    <label for="marca" class="edit-produto"> Marca do Produto </label>
                    <input class="input-fields" name="marca" id="marca" size="20" maxlength="80" type="text">
                </div>
                <div class="collumn-3">
                    <label for="modelo" class="edit-produto"> Modelo do produto </label>
                    <input class="input-fields" name="modelo" id="modelo" size="30" maxlength="80" type="text">
                    <label for="vencimento" class="edit-produto"> Data de Vencimento </label>
                    <input class="input-fields" name="vencimento" id="vencimento" size="10" type="date">
                    <label for="cod_interno" class="edit-produto"> Código Interno </label>
                    <input class="input-fields" name="cod_interno" id="cod_interno" size="20" maxlength="40" type="text">
                    <label for="num_nf" class="edit-produto"> Numero Nota Fiscal  </label>
                    <input class="input-fields" name="num_nf" id="num_nf" size="20" maxlength="20" type="text">
                    <label for="localizacao" class="edit-produto"> Localização </label>
                    <input class="input-fields" name="localizacao" id="localizacao" size="20" maxlength="30" type="text">
                </div>
            </div>
            <a href="menu.php" onclose="onclose" class="btn-green-teal-darken-1" name="btn-consultar" id="btn-consultar">Consultar</a>
            <a href="menu.php" onclose="onclose" class="btn-green-teal-darken-1" name="btn-alterar" id="btn-excluir">Alterar</a>
            <a href="menu.php" onclose="onclose" class="btn-green-teal-darken-1" name="btn-sair" id="sair">Sair</a>
        </form>
    </div>
</div>
<?php
include 'includes/footer.php';


