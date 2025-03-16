<?php
session_start();
include_once 'action/conexao.php';

if (empty($_POST['login_usuario']) || empty($_POST['senha_usuario'])){
	header('Location: index.php');
	exit();
}
$login_usuario = mysqli_real_escape_string($conexao, $_POST['login_usuario']);
$senha_usuario = mysqli_real_escape_string($conexao, $_POST['senha_usuario']);

$query = "SELECT nome_usuario FROM usuarios WHERE login_usuario = '{$login_usuario}' and senha_usuario = SHA1 ('{$senha_usuario}')";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if($row == 1) {
    $usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['nome_usuario'] = $usuario_bd['nome_usuario'];
	header('Location: menuSecund.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
    //echo 'Conexão Realizada com Sucesso! <br><br>';
    //echo "Usuario: $usuario";
    //mysqli_close($conexao);

