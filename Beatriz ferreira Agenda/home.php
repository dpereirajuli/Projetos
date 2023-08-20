<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<?php
include_once("conexao.php");
session_start();

///// SELECT PARA O CALENDARIO PARA MOSTRA NO GRID
$result_events = "SELECT a.id,
						a.title,
						a.start,
						a.color,
						a.end,
						b.nome,
						b.contato
						FROM events a,
						cliente b
						WHERE a.id_cliente=b.id_cliente";
$resultado_events = mysqli_query($conn, $result_events);







////ABRI MODAL
if(!empty($_SESSION ['abrir'])){

        if($_SESSION ['abrir'] == 'cliente'){

?>
            <script>
                $(document).ready(function(){
                $('#produto').offcanvas('show');
                });
            </script>
<?php
            unset($_SESSION['abrir']); // Remove a variável $_POST['cliente']
        }

}

////ABRI MODAL detalhes
if(!empty($_POST['detalhes'])){

	$detalhes= $_POST ['detalhes'];
	
	?>
    <script>
        $(document).ready(function(){
        $('#detalhes').modal('show');
        });
    </script>
<?php

}






//////INSERT'S
if(isset($_POST ['insert'])){

    ////CADASTRAR USUARIO 
    if(!empty($_POST['nome']) && !empty($_POST['celular']) && isset($_POST['cadastrar-usuario'])){

        $contato= $_POST ['celular'];
        $nome= $_POST ['nome'];

            $sql2="INSERT INTO `cliente`(`nome`,`contato`) VALUES ('$nome', '$contato')";
            $resultado_events = mysqli_query($conn, $sql2);

            $_SESSION['abrir'] = "cliente" ;
            header('location:home.php');
    }

    ///////// INSERIR EVENTO NO CALENDARIO
    if(isset($_POST['agendar']) && !empty($_POST['title']) && !empty($_POST['cliente'])){

        $title= $_POST ['title'];
        $start= $_POST ['start'];
        $cliente= $_POST ['cliente'];
        $end = date('Y-m-d H:i:s', strtotime($start . '+60 minutes'));
        $color= $_POST ['color'];


            $sql2="INSERT INTO `events`(`title`,`start`,end, id_cliente, color) VALUES ('$title', '$start','$end', $cliente, '$color')";
            $resultado_events = mysqli_query($conn, $sql2);
            header('location:home.php');
    }

}







/////DELETE

if(isset($_POST ['delete'])){

    //////EXCLUIR O CLIENTE
    if(!empty($_POST['excluir'])){

        $excluir= $_POST ['excluir'];

        $sql2 ="DELETE FROM cliente WHERE id_cliente = $excluir";
        mysqli_query($conn, $sql2);

        $resultado_events = mysqli_query($conn, $sql2);
        $_SESSION['abrir'] = "cliente" ;
        header('location:home.php');
    }

    //// EXLUIR O AGENDAMENTO
    if(!empty($_POST['excluir_agendamento'])){

        $id_agendamento= $_POST ['excluir_agendamento'];
        $id_detalhe= $_POST ['id_detalhe'];

        $sql2="DELETE FROM `events` WHERE id= $id_agendamento";
        $resultado_events = mysqli_query($conn, $sql2);

        ?>
        <form action="home.php" method="post" id="myForm">
            <input type="hidden" name="detalhes" value="<?php echo $$id_detalhe ?>">
        </form>

        <script>
        window.onload = function() {
            document.getElementById("myForm").submit();
        };
        </script>
<?php
    }

}

?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
            <link href='css/fullcalendar.min.css' rel='stylesheet' />
			<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
			<link href='css/personalizado.css' rel='stylesheet' />
			<script src='js/moment.min.js'></script>
			<script src='js/jquery.min.js'></script>
			<script src='js/fullcalendar.min.js'></script>
			<script src='locale/pt-br.js'></script>
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
			<script src="https://cdn.jsdelivr.net/npm/imask"></script>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					navLinks: false, // can click day/week names to navigate views
					editable: false,
					eventLimit: false, // allow "more" link when too many events
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){
								?>
								{
								id: '<?php echo $row_events['id']; ?>',
								title: '<?php echo $row_events['nome'] .' '. $row_events['contato']. '\n' .$row_events['title']; ?>',
								start: '<?php echo $row_events['start']; ?>',
								end: '<?php echo $row_events['end']; ?>',
								color: '<?php echo $row_events['color']; ?>',
								},<?php
							}
						?>
					]
				});
			});
		</script>
        
	</head>


	<body> 
        <div class="container-fluid header">   
            <div class="container div-btn">
                    <a class="btn btn-light btn-novo" data-bs-toggle="offcanvas" href="#produto" role="button">
                        Clientes
                    </a>
            </div>
        </div>

        <div class="container-fluid principal">
			<div id='calendar'></div>
                <div class="div-pc">
                    <h5>Agendar Serviço</h5>
                    <form action="home.php" method="POST">
                        <div class="d-flex linha">
                            <div class="mb-3">
                                    <input type="hidden" name="insert">
                                    <label for="eventoDataHora" class="form-label">Data e Hora do serviço</label>
                                    <input type="datetime-local" class="form-control" name="start" required lang="pt">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Serviço Prestado</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>

                                <div class="mb-3">
                                    <label  class="form-label">Cliente</label>
                                    <select name="cliente" class="form-control">
                                                        <option value="">Selecione</option>
                                                <?php
                                                    $sql3 = "SELECT * FROM cliente";
                                                    $result3 = mysqli_query($conn, $sql3);
                                                    while($row3 = mysqli_fetch_row($result3))
                                                    { 
                                                        $id_cliente=$row3[0];   
                                                        $nome=$row3[1]; 
                                                        echo "<option value='$id_cliente'>$nome</option>";
                                                    }
                                                ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Cor</label>
                                    <select name="color" class="form-control">
                                                    <option value=""></option>
                                            <option value="#00FF00" id="verde">Verde</option>
                                            <option value="#FF0000" id="vermelho">Vermelho</option>
                                            <option value="#FF69B4" id="rosa">Rosa</option>
                                            <option value="#0000FF" id="azul">Azul</option>
                                            <option value="#FFFF00" id="amarelo">Amarelo</option>
                                    </select>
                                </div>
                        </div>
                    <button class="btn btn-primary btn-sm" type="submit" name="agendar">Agendar</button>
                    </form>
                    <img src="logo.jpeg" alt="" id="logo-pc">
                </div>
  		</div>
        
        <footer>
            <div class="container div-footer">
                <p> | Suporte Dtech (11) 95706-9657 | </p>
            </div>
        </footer>





            <!-- EXBIRI TODOS OS CLIENTE MODAL -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="produto" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Clientes</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
						<i class="fa fa-plus" aria-hidden="true">Novo Cliente</i>
					</button>
					<?php
									$sql = "SELECT *
											FROM cliente";
									$query = mysqli_query($conn, $sql); 	
					?>
						<table class="table table-bordered table-sm tabela">
							<thead>
								<tr>
									<th style="width:20%" scope="col">Cliente</th>
									<th style="width:20%" scope="col">Contato</th>
									<th style="width:05%" scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
										if(!empty($query) && mysqli_num_rows($query) > 0){
										while($row = mysqli_fetch_assoc($query)){
											$id_cliente = $row['id_cliente'];
											$nome = $row['nome'];
											$contato = $row['contato'];
									?>
										<td>  <?php echo $nome;  ?> </td>
										<td>  <?php echo $contato;  ?> </td>
										<td>
											<form action="home.php" method="POST">
                                                <input type="hidden" name="delete">
												<input type="hidden" name="excluir" value="<?php echo $id_cliente; ?>"> 
													<button type="submit" class="btn btn-danger btn-sm">
													<i class="fa fa-trash" aria-hidden="true"></i>

													</button>
											</form>
											<form action="home.php" method="POST">
												<input type="hidden" name="detalhes" value="<?php echo $id_cliente; ?>"> 
													<button type="submit" class="btn btn-warning btn-sm">
														<i class="fa fa-book" aria-hidden="true"></i>
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
								}
								?>
							</tbody>
						</table>
                </div>
            </div>

            <!-- CADASTRAR NOVO CLIENTE -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post">
                            <div class="mb-3">
                                    <label for="eventoDataHora" class="form-label">Nome Completo</label>
                                    <input type="hidden" name="insert">
                                    <input type="text" class="form-control" name="nome" required>
                                </div>
                                <div class="mb-3">
								    <label  class="form-label">Tel/Cel</label>
								    <input type="text" class="form-control" id="celular" name="celular" required>
							    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="input" class="btn btn-primary" name="cadastrar-usuario">Cadastrar</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>


            <!-- MODAL DE DETALHES	 -->
            <div class="modal fade" id="detalhes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agendamentos do cliente </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php
                                        $sql = "SELECT a.id_cliente,
                                                        a.nome,
                                                        a.contato,
                                                        b.title,
                                                        b.id,
                                                        b.start,
                                                        b.id
                                                        FROM cliente a,
                                                        events b
                                                        WHERE a.id_cliente=$detalhes
                                                        AND a.id_cliente=b.id_cliente";
                                        $query = mysqli_query($conn, $sql); 	
                        ?>
                            <table class="table table-bordered table-sm tabela">
                                <thead>
                                    <tr>
                                        <th style="width:20%" scope="col">Data</th>
                                        <th style="width:20%" scope="col">serviço</th>
                                        <th style="width:05%" scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                            if(!empty($query) && mysqli_num_rows($query) > 0){
                                            while($row3 = mysqli_fetch_assoc($query)){
                                                $title = $row3['title'];
                                                $start = $row3['start'];
                                                $id = $row3['id'];
                                                $id_cliente = $row3['id_cliente'];
                                                $nome3 = $row3['nome'];
                                        ?>
                                            <td>  <?php echo $start;  ?> </td>
                                            <td>  <?php echo $title;  ?> </td>
                                            <td>
                                                <form action="home.php" method="POST">
                                                    <input type="hidden" name="delete">
                                                    <input type="hidden" name="excluir_agendamento" value="<?php echo $id; ?>"> 
                                                    <input type="hidden" name="id_detalhe" value="<?php echo $id_cliente; ?>"> 
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
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
                                    }
                                    ?>
                                </tbody>

                            </table>
                    </div>
                    </div>
                </div>
            </div>
	</body>
</html>
