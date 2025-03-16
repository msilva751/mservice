<?php
include_once 'includes/header.php';
include_once 'menu.php';
include_once 'link.php';

//if(isset($_POST['btn-cobsultar'])):

//if (empty($_POST['cod_produto'])){
	//header('Location: consul-produto.php');
	//exit();
//}

$cod_produto = isset($_POST['cod_produto']) ? $_POST['cod_produto'] : false;
$consul_produt = "SELECT * FROM produto WHERE cod_produto = '$cod_produto'";
$result_produt = mysqli_query($link, $consul_produt);
$dados = mysqli_fetch_array($result_produt);

//endif;

?>
<div class="contanier">
    <div class="controls">
        <h5>Consulta de Produtos</h5>
    </div>
    <div class="FormConsulProduto">
        <form action = "<?= $_SERVER['PHP_SELF']; ?>" method = "POST">
            <div class="cad-produto">
                <div class="collumn-1">
                    <input type = "hidden" name = "id_produto" id="id_produto" value = "<?= $dados['id_produto'] || null ?>">
                    <label for="cod_produto" class="cad-produto"> Código produto </label>
                    <input class="input-fields" name="cod_produto" id="cod_produto" value="<?= $dados['cod_produto'] ?>" size="20" maxlength="21" type="text">
                    <label for="nome_produto" class="cad-produto"> Nome do produto </label>
                    <input class="input-fields" name="nome_produto" id="nome_produto" value="<?= $dados['nome_produto'] ?>" size="40" maxlength="50" type="text">
                    <label for="date_cadastro" class="cad-produto"> Data Cadastro </label>
                    <input class="input-fields" name="date_cadastro" id="date_cadastro" value="<?= $dados['date_cadastro'] ?>"  size="20" type="text">
                    <label for="desc_produto" class="cad-produto"> Descrição do produto </label>
                    <input class="input-fields" name="desc_produto" id="desc_produto" value="<?= $dados['desc_produto'] ?>" size="40" maxlength="80" type="text">
                    <label for="lote" class="cad-produto"> Lote </label>
                    <input class="input-fields" name="lote" id="lote" value="<?= $dados['lote'] ?>" size="20" maxlength="80" type="text">
                    <label for="cor_produto" class="cad-produto"> Cor </label>
                    <input class="input-fields" name="cor_produto" id="cor_produto" value="<?= $dados['cor_produto'] ?>" size="30" maxlength="50" type="text">
                    <label for="q_produto" class="cad-produto"> Quantidade </label>
                    <input class="input-fields" name="q_produto" id="q_produto" value="<?= $dados['q_produto'] ?>" size="20" maxlength="20" type="text">
                </div>
                <div class="collumn-2">
                    <label for="esp_produto" class="cad-produto"> Especie </label>
                    <input class="input-fields" name="esp_produto" id="esp_produto" value="<?= $dados['esp_produto'] ?>" size="20" maxlength="20" type="text">
                    <label for="vlr_unitario" class="cad-produto"> Valor Unitário </label>
                    <input class="input-fields" name="vlr_unitario" id="vlr_unitario" value="<?= $dados['vlr_unitario'] ?>" size="20" maxlength="11" type="text">
                    <label for="vlr_venda" class="cad-produto"> Preço de Venda </label>
                    <input class="input-fields" name="vlr_venda" id="vlr_venda" value="<?= $dados['vlr_venda'] ?>" size="20" maxlength="11" type="text">
                    <label for="vlr_total_prod" class="cad-produto"> Valor Total Produto </label>
                    <input class="input-fields" name="vlr_total_prod" id="vlr_total_prod" value="<?= $dados['vlr_total_prod'] ?>" size="20" maxlength="11" type="text">
                    <label for="vlr_total_nf" class="cad-produto"> Valor Total da Nota </label>
                    <input class="input-fields" name="vlr_total_nf" id="vlr_total_nf" value="<?= $dados['vlr_total_nf'] ?>" size="20" maxlength="11" type="text">
                    <label for="fornecedor" class="cad-produto"> Fornecedor </label>
                    <input class="input-fields" name="fornecedor" id="fornecedor" value="<?= $dados['fornecedor'] ?>" size="40" maxlength="60" type="text">
                    <label for="marca" class="cad-produto"> Marca do Produto </label>
                    <input class="input-fields" name="marca" id="marca" value="<?= $dados['marca'] ?>" size="20" maxlength="80" type="text">
                </div>
                <div class="collumn-3">
                    <label for="modelo" class="cad-produto"> Modelo do produto </label>
                    <input class="input-fields" name="modelo" id="modelo" value="<?= $dados['modelo'] ?>" size="30" maxlength="80" type="text">
                    <label for="vencimento" class="cad-produto"> Data de Vencimento </label>
                    <input class="input-fields" name="vencimento" id="vencimento" value="<?= $dados['vencimento'] ?>" size="10" type="text">
                    <label for="cod_interno" class="cad-produto"> Código Interno </label>
                    <input class="input-fields" name="cod_interno" id="cod_interno" value="<?= $dados['cod_interno'] ?>" size="20" maxlength="40" type="text">
                    <label for="num_nf" class="cad-produto"> Numero Nota Fiscal  </label>
                    <input class="input-fields" name="num_nf" id="num_nf" value="<?= $dados['num_nf'] ?>" size="20" maxlength="20" type="text">
                    <label for="localizacao" class="cad-produto"> Localização </label>
                    <input class="input-fields" name="localizacao" id="localizacao" value="<?= $dados['localizacao'] ?>" size="20" maxlength="30" type="text">
                </div>
            </div>
            <button type="submit" name="btn-consultar" id="btn-consultar" class="btn-green-teal-darken-1"> CONSULTAR </button>
            
            <a href="menu.php" onclose="onclose" class="btn-green-teal-darken-1" name="btn-sair" id="sair">Sair</a>
        </form>
    </div>
</div>
<?php
include 'includes/footer.php';

