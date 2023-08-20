<?php


        $sql="SELECT * FROM `tb_usuario` 
            Where acesso='S'";
        $query = mysqli_query($conexao, $sql); 	
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="pendente.css">

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Usuario</th>
                    <th>Senha</th>
                    <th>Nivel</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if(!empty($query) && mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_assoc($query)){
                            $nome = $row['nome'];
                            $usuario = $row['usuario'];
                            $id_usuario = $row['id_usuario'];
                            $senha = $row['senha'];
                            $nivel = $row['nivel'];
                        ?>
                            <td><?php echo $nome;  ?> </td>
                            <td><?php echo $usuario;  ?> </td>
                            <td><?php echo $senha;  ?> </td>
                            <td><?php echo $nivel;  ?> </td>
                            <td id="td-acesso">
                                <form action="solicitacao.php" method="post">
                                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>"> 
                                    <button type="submit" class="btn btn-danger btn-sm" name="acesso" value="nao">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                                
                            </tr>
                        <?php
                        }
                    }
                    else{
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<td>-</td>";
                        echo "<tr></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
