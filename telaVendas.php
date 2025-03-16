<?php

include_once 'includes/header.php';
include_once 'menu.php';
?>
<style>
    .containr{
        margin: 0px 0;
        padding: 0px;
    }
    .t-venda{
        margin-top: auto;
        text-align: center;
        color:#ef6c00;
        width: auto;
        background-color: #004d40;
    }
    label{
        margin-left: 20px;
    }
    .tela-input{
        margin-left: 20px;
        display: flex;
        
        width: 400px;
        height: 60px;
        background-color: #004d40;
    }
    .img-produto{
        float: right;
        margin-right: 20px;
        width: 300px;
        height: 300px;
        border: 1px solid;
    }
    .t-pedido{
        margin-top: 0px;
        padding: 15px;
    }
</style>
<div class="t-venda">
    <h2 class="t-pedido">Incluir Pedido</h2>
</div>
<form>
    <div class="container">
        <div>
            <img src="images/botijao_gas_13kg.jpg" alt="img_produto" class="img-produto"><br>
        </div>
        <div class="collumn-01">
            <label for="cQtd">Código Produto</label>
            <input type="text" onblur="" name="codProduto" id="codProduto" value="0" class="tela-input" /><br>
            <label for="cQtd">Quantidade Produto</label>
            <input type="number" onclick="calc_total()" name="tQtd" id="cQtd" min="0" max="5" value="0" class="tela-input" /><br>
            <label for="cTot">Preço Unitário R$</label> 
            <input type="text" name="pUnit" id="pUnit" placeholder="Total apagar" value="" readonly="" class="tela-input" /><br>
            <label for="cTot">Preço Total</label>
            <input type="text" name="cTot" id="cTot" placeholder="Total apagar" value="" readonly="" class="tela-input"/>
        </div>
    </div>
</form>
<script>
    function calc_total() {
        const qtd = parseInt(document.getElementById('cQtd').value);
        const unit = 15;
        document.getElementById('pUnit').value = unit;
        const tot = qtd * 15;
        document.getElementById('cTot').value = tot;
    }
</script>
<?php

include_once 'includes/footer.php';
