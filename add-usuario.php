<?php
include_once 'action/conexao.php';
include_once 'menu.php';
//echo "<br><br><br><br>";
if (isset($_POST['btn-cad-usuario'])):
        function validaCPF($cpf = null) {

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
            }
            $digitoB += $cpf[$i] * $x;
        }
        $somaA = (($digitoA % 11) < 2 ) ? 0 : 11 - ($digitoA % 11);
        $somaB = (($digitoB % 11) < 2 ) ? 0 : 11 - ($digitoB % 11);
        if ($somaA != $cpf[9] || $somaB != $cpf[10]) {
            return TRUE;
        }
    }
    if (validaCPF($_POST['cpf_usuario'])) {
        $_SESSION['invalido'] = TRUE;
        header('Location:cad-usuario.php');
        exit();
    }

    $cpf_usuario = mysqli_escape_string($conexao, $_POST['cpf_usuario']);
    $nome_usuario = mysqli_escape_string($conexao, $_POST['nome_usuario']);
    $email_usuario = mysqli_escape_string($conexao, $_POST['email_usuario']);
    $login_usuario = mysqli_escape_string($conexao, (trim($_POST['login_usuario'])));
    $senha_usuario = mysqli_escape_string($conexao, (sha1($_POST['senha_usuario'])));
    $confirm_senha = mysqli_escape_string($conexao, (sha1($_POST['confirm_senha'])));
    $numero_loja = mysqli_escape_string($conexao, $_POST['numero_loja']);
    $nome_loja = mysqli_escape_string($conexao, $_POST['nome_loja']);

    $cadastro = "SELECT COUNT(*) AS total FROM usuarios WHERE cpf_usuario = '$cpf_usuario'";
    $busca_cadastro = mysqli_query($conexao, $cadastro);
    $registro = mysqli_fetch_array($busca_cadastro);
    if ($registro['total'] == 1) {
        $_SESSION['usuario_existe'] = TRUE;
        header('Location:cad-usuario.php');
        exit();
    }
    if ($senha_usuario != $confirm_senha) {
        $_SESSION ['confirme_senha'] = TRUE;
        header('Location:cad-usuario.php');
        exit();
    }
    $sql = "INSERT INTO usuarios (cpf_usuario, nome_usuario, email_usuario, login_usuario, senha_usuario, confirm_senha, numero_loja, nome_loja, data_cadastro) VALUES
    ('$cpf_usuario', '$nome_usuario', '$email_usuario', '$login_usuario', '$senha_usuario', '$confirm_senha', '$numero_loja', '$nome_loja', NOW())";
    //mysqli_set_charset($conexao, 'utf8_encode');
    if ($conexao->query($sql) === TRUE) {
        $_SESSION ['status_cadastro'] = TRUE;
        header('Location:cad-usuario.php');
        exit();
    }
endif;
$conexao->close();


