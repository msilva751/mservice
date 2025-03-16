<?php
session_start();
include_once 'action/conexao.php';
if (isset($_POST['btn-alter-senha'])):
    //$id_usuario = mysqli_escape_string($conexao, $_POST['id_usuario']);
    //$cpf_usuario = mysqli_escape_string($link, $_POST['cpf_usuario']);
    //$nome_usuario = mysqli_escape_string($link, $_POST['nome_usuario']);
    //$email_usuario = mysqli_escape_string($link, $_POST['email_usuario']);
    //$login_usuario = mysqli_escape_string($link, $_POST['login_usuario']);
    $senha_usuario = mysqli_escape_string($conexao,(sha1($_POST['senha_usuario'])));
    $confirm_senha = mysqli_escape_string($conexao,(sha1($_POST['confirm_senha'])));
    //$numero_loja = mysqli_escape_string($link, $_POST['numero_loja']);
    //$nome_loja = mysqli_escape_string($link, $_POST['nome_loja']);

    if ($senha_usuario != $confirm_senha) {
        $_SESSION ['nova_senha'] = TRUE;
        header('Location:consul-usuario.php');
        exit();
    }
    $query = "UPDATE usuarios SET senha_usuario = '$senha_usuario', confirm_senha = '$confirm_senha'";
    if (mysqli_query($conexao, $query)){
        $_SESSION['alter_senha'] = TRUE;
        header('Location:consul-usuario.php');
        exit();
    }
endif;

