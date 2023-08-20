<?php
include_once("conexao.php");
$result_events = "SELECT * FROM cliente";
$result = mysqli_query($conn,$result_events);

if(isset($_POST['agendar']) && !empty($_POST['title']) && !empty($_POST['cliente'])){

	$title= $_POST ['title'];
	$start= $_POST ['start'];
	$cliente= $_POST ['cliente'];
	$end = date('Y-m-d H:i:s', strtotime($start . '+60 minutes'));


	$sql2="INSERT INTO `events`(`title`,`start`,end, id_cliente) VALUES ('$title', '$start','$end', $cliente)";
	$resultado_events = mysqli_query($conn, $sql2);
	header('location:index.php');
}


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
			<link href='css/personalizado.css' rel='stylesheet' />
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
			<script src="https://cdn.jsdelivr.net/npm/imask"></script>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body> 
		<div class="container menu-botoes">
			<div class="dropdown">
                <a href="index.php" class="btn btn-secondary">
                    Home
                </a>
			</div>
		</div>
		<div>
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Novo Cliente
			</button>
		</div>
		<div class="container-fluid principal">

            <table class="table table-bordered table-sm tabela-produto">
                <thead>
                    <tr>
                        <th style="width:30%" scope="col">Nome</th>
                        <th style="width:20%" scope="col">Contato</th>
                        <th style="width:01%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            if(!empty($result) && mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $id_cliente = $row['id_cliente'];
                                    $nome = $row['nome'];
                                    $contato = $row['contato'];
                        ?>
                                <td>  <?php echo $nome;  ?> </td>
                                <td>  <?php echo $contato;  ?> </td>
                                <td class="form-acao">
                                    <form action="ac_produto.php" method="post">
                                        <input type="hidden" name="excluir_produto" value="<?php echo $id_produto; ?>"> 
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    </form>
                                    <form action="painel.php" method="post">
                                        <input type="hidden" name="produto" value="produto"> 
                                        <input type="hidden" name="editar_produto" value="<?php echo $id_produto; ?>"> 
                                        <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    </form> 
                                    <form action="painel.php" method="post">
                                        <input type="hidden" name="produto" value="produto"> 
                                        <input type="hidden" name="quantidade" value="<?php echo $id_produto; ?>"> 
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
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
                            echo "<td>-</td>";
                            echo "<td>-</td>";
                            echo "<td>-</td>";
                        }
                        ?>
                </tbody>
            </table>
  		</div>


		
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="ac.php" method="post">
						<div class="mb-3">
								<label for="eventoDataHora" class="form-label">Nome Completo</label>
								<input type="text" class="form-control" name="nome" required>
							</div>
							<div class="mb-3">
								<label  class="form-label">Tel/Cel</label>
								<input type="text" class="form-control" id="celular" name="celular" required>
							</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="input" class="btn btn-primary">Cadastrar</button>
					</form>
				</div>
				</div>
			</div>
		</div>


		<script>
			var numeroCelularInput = document.getElementById('celular');
			var mascara = new IMask(numeroCelularInput, {
			mask: '(00) 00000-0000'
			});
		</script>

	</body>



</html>
