<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['usuario'])) {
    $_SESSION['msg'] = "Usuário ou senha inválidos";
	header('Location: index.php');
	exit();
}

    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "SELECT id_usuario FROM tb_usuario WHERE usuario = '{$usuario}' AND senha = '$senha' AND acesso= 'S' ";

	$result = mysqli_query($conexao, $query);
	$row = mysqli_num_rows($result);

        if($row == 1) {
            $_SESSION['usuario'] = $usuario;
            header('Location: painel.php');
            exit();
        }

        else{
            $_SESSION['msg'] = "Usuário ou senha inválidos";
            header('Location: index.php');
            exit();
        }






