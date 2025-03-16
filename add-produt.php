<?php
include_once 'link.php';
include_once 'menu.php';
if (isset($_POST['btn-add-produt'])):

    $cod_produto = mysqli_escape_string($link, $_POST['cod_produto']);
    $nome_produto = mysqli_escape_string($link, $_POST['nome_produto']);
    $date_cadastro = mysqli_escape_string($link, $_POST['date_cadastro']);
    $desc_produto = mysqli_escape_string($link, $_POST['desc_produto']);
    $lote = mysqli_escape_string($link, $_POST['lote']);
    $cor_produto = mysqli_escape_string($link, $_POST['cor_produto']);
    $q_produto = mysqli_escape_string($link, $_POST['q_produto']);
    $esp_produto = mysqli_escape_string($link, $_POST['esp_produto']);
    $vlr_unitario = mysqli_escape_string($link, $_POST['vlr_unitario']);
    $vlr_venda = mysqli_escape_string($link, $_POST['vlr_venda']);
    $vlr_total_prod = mysqli_escape_string($link, $_POST['vlr_total_prod']);
    $vlr_total_nf = mysqli_escape_string($link, $_POST['vlr_total_nf']);
    $fornecedor = mysqli_escape_string($link, $_POST['fornecedor']);
    $marca = mysqli_escape_string($link, $_POST['marca']);
    $modelo = mysqli_escape_string($link, $_POST['modelo']);
    $vencimento = mysqli_escape_string($link, $_POST['vencimento']);
    $cod_interno = mysqli_escape_string($link, $_POST['cod_interno']);
    $num_nf = mysqli_escape_string($link, $_POST['num_nf']);
    $localizacao = mysqli_escape_string($link, $_POST['localizacao']);

$produt = "INSERT INTO produto(cod_produto, nome_produto, date_cadastro, desc_produto, lote, cor_produto,
q_produto, esp_produto, vlr_unitario, vlr_venda, vlr_total_prod, vlr_total_nf, fornecedor, marca, modelo, vencimento, cod_interno, num_nf, localizacao, data_cadastro)
VALUES('$cod_produto','$nome_produto','$date_cadastro','$desc_produto','$lote','$cor_produto','$q_produto','$esp_produto','$vlr_unitario','$vlr_venda','$vlr_total_prod','$vlr_total_nf','$fornecedor','$marca','$modelo','$vencimento','$cod_interno','$num_nf','$localizacao',NOW())";
if ($link->query($produt) === true) {
    //$_SESSION ['status_cadastro'] = true;
    header('Location:cad-produto.php');
    exit();
    echo 'Produto cadastrado com sucesso';
}
endif;
$link->close();