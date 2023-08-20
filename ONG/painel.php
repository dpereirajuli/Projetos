<?php
            session_start();
            $usuario = $_SESSION['usuario'] ;
            include "footer.php";
            include "conexao.php";

            $sql="SELECT * FROM `tb_usuario` 
            Where usuario='$usuario'";
            $query = mysqli_query($conexao, $sql); 	
    ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        

    <link rel="stylesheet" href="painel.css">
    <link rel="stylesheet" href="nav.css">
    <title>Central Painel</title>

</head>
<body id="body">

    <nav class="navbar navbar-expand-lg nav-bar">
        <div class="container">
            <div class="div-logo">
                <a class="navbar-brand" href="painel.php">
                    <img src="logo.png" alt="Logotipo" id="img-nav">
                </a>
            </div>
            <div class="dropdown ativar-menu">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-border-width" viewBox="0 0 16 16">
                        <path d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-2zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <form action="" method="POST">
                        <li>
                            <button type="submit" class="dropdown-item" name="autorizar" valeu="autorizar">Autorizar</button>
                        </li>
                        <li>
                            <button class="dropdown-item"  name="">Sobre</button>
                        </li>
                        <li>
                            <button class="dropdown-item"  name="">Contato</button>
                        </li>
                        <li>
                            <button class="dropdown-item"  name="">Contato</button>
                        </li>
                    </form>
                </ul>
            </div>
            <div class="collapse navbar-collapse">
                <form action="" method="POST">
                        <ul class="navbar-nav">
                                <li>
                                    <button class="nav-item" type="submit" name="autorizar" value="autorizar">Autorizar</button>
                                </li>
                                <li>
                                    <button  class="nav-item" type="submit" name="usuario" value="usuario">Usúarios</button>
                                </li>
                                <li>
                                    <button type="button" class="nav-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Cadastrar Dependente
                                    </button>
                                </li>
                                <li>
                                    <button class="nav-item"><a href="logout.php">Deslogar</a></button>
                                </li>
                        </ul>
                </form>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#sobre">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                            </svg>
                        </a>
                      </li>
                </ul>
            </div>
        </div>
    </nav>


    <?php
        if(!empty($_POST['autorizar'])){
            include "pendente_autoriza.php";
        }

        elseif(!empty($_POST['usuario'])){
            include "usuarios.php";
        }

        else{

       

        while($row = mysqli_fetch_assoc($query)){
            $nome = $row['nome'];
            $usuario = $row['usuario'];
            $id_usuario = $row['id_usuario'];
            $senha = $row['senha'];
            $nivel = $row['nivel'];
            $nome_foto = $row['nome_foto'];
            $data_nascimento = $row['data_nascimento'];
            $data_nascimento = date('d/m/Y', strtotime($data_nascimento));
        }
    ?>
    

        <div class="carteirinha">
            <img src="upload/<?php echo $nome_foto ?>"  class="foto">
            <h2 id="azul"><?php echo $nome; ?></h2>
            <p >Data de Nascimento: <?php echo $data_nascimento; ?></p>
            <p>ONG MARAISA – PONTE ALTA</p>
        </div>


        <?php

                
        // Consulta SQL para selecionar os dependentes do usuário
        $sql2 = "SELECT * FROM `tb_dependente` WHERE id_usuario = $id_usuario";
        $resultado = mysqli_query($conexao, $sql2);

    
        // Verifica se há algum resultado retornado na consulta
        if (mysqli_num_rows($resultado) > 0) {
            // Exibe a carteirinha para cada dependente
            while ($row2 = mysqli_fetch_assoc($resultado)) {
                $nome2 = $row2['nome'];
                $data_nascimento2 = $row2['data_nascimento'];
                $nome_foto2 = $row2['nome_foto'];
                ?>

                <div class="carteirinha">
                    <img src="upload/<?php echo $nome_foto2 ?>" class="foto">
                    <h2 id="azul"><?php echo $nome2; ?></h2>
                    <p>Data de Nascimento: <?php echo $data_nascimento2; ?></p>
                    <p>ONG MARAISA – PONTE ALTA</p>
                </div>

                <?php
            }
        } 

    }   
?>





    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Dependente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="cadastrar_dependente.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nome Completo</label>
                            <input type="hidden" class="form-control" name="id_dependente" value="<?php echo $id_usuario?>">
                            <input type="text" class="form-control" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" name="data_nascimento">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Imagem de Perfil</label>
                            <input type="file" class="form-control" name="imagem">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






</body>
</html>