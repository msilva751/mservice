<?php
include_once 'menu.php';
include_once 'link.php';
//echo "<br><br><br><br><br><br>";
if (isset($_POST['btn-cadastrar'])):
    function validaCPF($cpf = NULL) {

        // Verifica se um número foi informado
	if(empty($cpf)) {
            return TRUE;
	}

        // Elimina possivel mascara
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return TRUE;
        }
        $digitoA = 0;
        $digitoB = 0;
        for ($i = 0, $x = 10; $i <= 8; $i++, $x--) {
            $digitoA += $cpf[$i] * $x;
        }
        for ($i = 0, $x = 11; $i <= 9; $i++, $x--) {
            if (str_repeat($i, 11) == $cpf) {
                return TRUE;
                break;
            }
            $digitoB += $cpf[$i] * $x;
        }
        $somaA = (($digitoA % 11) < 2 ) ? 0 : 11 - ($digitoA % 11);
        $somaB = (($digitoB % 11) < 2 ) ? 0 : 11 - ($digitoB % 11);
        if ($somaA != $cpf[9] || $somaB != $cpf[10]) {
            return TRUE;
        }
    }
    if (validaCPF($_POST['cpf_cnpj'])) {
        $_SESSION['cpf_invalido'] = TRUE;
        header('Location:form-cad.php');
        exit();
    }
    $cpf_cnpj = mysqli_escape_string($link, $_POST["cpf_cnpj"]);
    $insc_estadual = mysqli_escape_string($link, $_POST["insc_estadual"]);
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

    $sql = "SELECT COUNT(*) AS total FROM cadastro WHERE cpf_cnpj = '$cpf_cnpj'";
    $result = mysqli_query($link, $sql);
    $registro = mysqli_fetch_array($result);

    if ($registro['total'] == 1) {
        header('Location:form-cad.php');
        $_SESSION['cliente_existe'] = TRUE;
        exit();
    }
    $sql = "INSERT INTO cadastro (cpf_cnpj, insc_estadual, nome, r_social, email, cep, endereco, numero, complemento, bairro, cidade, uf, tel_fixo, tel_celular, referencia, data)
    VALUES ('$cpf_cnpj', '$insc_estadual', '$nome', '$r_social',  '$email', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$tel_fixo', '$tel_celular', '$referencia', NOW())";
    //mysqli_set_charset($link, 'utf8_general');

    if (mysqli_query($link, $sql)):
        $_SESSION['cadastro'] = "Cadastrado efetuado com sucesso!";
        header('Location:form-cad.php');
    else:
        $_SESSION['cadastro'] = "Erro ao cadastro cliente";
        header('Location:form-cad.php');
    endif;
endif;
$link->close();
