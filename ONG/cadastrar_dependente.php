<?php

include "conexao.php";

if (isset($_POST['nome'])) {
    // USUÁRIO PEDINDO SOLICITAÇÃO
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $id_dependente = $_POST['id_dependente'];

    // Obtenha o nome do arquivo e extensão da imagem
    $imagem_nome = $_FILES['imagem']['name'];
    $imagem_extensao = pathinfo($imagem_nome, PATHINFO_EXTENSION);

    // Gere um nome aleatório para a imagem
    $novo_nome = uniqid() . '.' . $imagem_extensao;

    // Defina o diretório de destino
    $diretorio_destino = 'upload/';

    // Movendo a imagem para o diretório de destino com o novo nome
    $imagem_caminho = $diretorio_destino . $novo_nome;
    move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem_caminho);

    $sql = "INSERT INTO `tb_dependente`(`nome`, `data_nascimento`, `id_usuario`, nome_foto) 
    VALUES ('$nome', '$data_nascimento', '$id_dependente', '$novo_nome')";
    $result = mysqli_query($conexao, $sql);
    header('Location: painel.php');
    exit();
}
