<?php
include_once 'menu.php';
include_once 'link.php';
//echo "<br><br><br><br><br><br><br><br>";
if (isset($_POST['btn-atualizar'])):
    //var_dump($_POST);
    $id_cliente = mysqli_escape_string($link, $_POST['id_cliente']);
    $cpf_cnpj = mysqli_escape_string($link, $_POST['cpf_cnpj']);
    $insc_estadual = mysqli_escape_string($link, $_POST['insc_estadual']);
    $nome = mysqli_escape_string($link, $_POST['nome']);
    $r_social = mysqli_escape_string($link, $_POST['r_social']);
    $email = mysqli_escape_string($link, $_POST['email']);
    $cep = mysqli_escape_string($link, $_POST['cep']);
    $endereco = mysqli_escape_string($link, $_POST['endereco']);
    $numero = mysqli_escape_string($link, $_POST['numero']);
    $complemento = mysqli_escape_string($link, $_POST['complemento']);
    $bairro = mysqli_escape_string($link, $_POST['bairro']);
    $cidade = mysqli_escape_string($link, $_POST['cidade']);
    $uf = mysqli_escape_string($link, $_POST['uf']);
    $tel_fixo = mysqli_escape_string($link, $_POST['tel_fixo']);
    $tel_celular = mysqli_escape_string($link, $_POST['tel_celular']);
    $referencia = mysqli_escape_string($link, $_POST['referencia']);

    $sql = "UPDATE cadastro  SET cpf_cnpj = '$cpf_cnpj', insc_estadual = '$insc_estadual', nome = '$nome', r_social = '$r_social', email = '$email', cep = '$cep', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf', tel_fixo = '$tel_fixo', tel_celular = '$tel_celular', referencia = '$referencia'  WHERE id_cliente = $id_cliente";
    //mysqli_set_charset($link, 'utf8_encode');
    
    if (mysqli_query($link, $sql)):
        header('Location:consul-cliente.php');
        $_SESSION['mensagens'] = "Cadastro atualizado com sucesso!";
        exit();
    else:
        header('Location:menu.php');
        $_SESSION['mensagens'] = "Erro ao atualizar";
        exit();
    endif;
endif;