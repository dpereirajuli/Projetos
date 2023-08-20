
<?php
session_start();
include('conexao.php');


if(isset($_POST['usuario'])){
    ////// USUARIO PEDINDO SOLICITAÇÃO
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    
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


                
    $sql= "INSERT INTO `tb_usuario`(`usuario`,`nome`, `senha`, `nivel`, `acesso`, data_nascimento, nome_foto) 
    VALUES ('$usuario','$nome', '$senha', 1, 'N', '$data_nascimento', '$novo_nome')";
    $result = mysqli_query($conexao, $sql);
    header('Location: index.php');
    exit();

}

if(isset($_POST['acesso'])){

    if($_POST['acesso'] == "sim"){

        $id_usuario = $_POST['id_usuario'];
        $sql= "UPDATE `tb_usuario` SET acesso='S'
                    WHERE id_usuario= $id_usuario ";
                    
        $result = mysqli_query($conexao, $sql);
        header('Location: painel.php');
        exit();

    }

    if($_POST['acesso'] == "nao"){

        $id_usuario = $_POST['id_usuario'];
        $sql= "DELETE FROM `tb_usuario`
                    WHERE id_usuario=$id_usuario ";

        $result = mysqli_query($conexao, $sql);
        header('Location: painel.php');
        exit();

    }
}




