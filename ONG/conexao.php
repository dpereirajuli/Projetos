<?php
define('HOST', '127.0.0.1:3306');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'bd_padrao');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
?>