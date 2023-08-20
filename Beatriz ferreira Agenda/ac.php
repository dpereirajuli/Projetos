
<?php
include_once("conexao.php");


if(isset($_POST['agendar']) && !empty($_POST['title']) && !empty($_POST['cliente'])){

	$title= $_POST ['title'];
	$start= $_POST ['start'];
	$cliente= $_POST ['cliente'];
	$end = date('Y-m-d H:i:s', strtotime($start . '+60 minutes'));
	$color= $_POST ['color'];


	$sql2="INSERT INTO `events`(`title`,`start`,end, id_cliente, color) VALUES ('$title', '$start','$end', $cliente, '$color')";
	$resultado_events = mysqli_query($conn, $sql2);
	header('location:index.php');
}



//// CADASTRAR CLIENTE
if(!empty($_POST['nome']) && !empty($_POST['celular'])){

	$contato= $_POST ['celular'];
	$nome= $_POST ['nome'];
	$sql2="INSERT INTO `cliente`(`nome`,`contato`) VALUES ('$nome', '$contato')";
	$resultado_events = mysqli_query($conn, $sql2);
	header('location:index.php');
}



//////EXCLUIR O CLIENTE
    if(!empty($_POST['excluir'])){

        $excluir= $_POST ['excluir'];

        $sql2 ="DELETE FROM cliente WHERE id_cliente = $excluir";
        mysqli_query($conn, $sql2);

        $resultado_events = mysqli_query($conn, $sql2);
        header('location:index.php');
    }




    //// EXLUIR O AGENDAMENTO
    if(!empty($_POST['excluir_agendamento'])){

        $id_agendamento= $_POST ['excluir_agendamento'];
        $id_detalhe= $_POST ['id_detalhe'];

        $sql2="DELETE FROM `events` WHERE id= $id_agendamento";
        $resultado_events = mysqli_query($conn, $sql2);


        header('location:index.php?detalhes='.$id_detalhe.'');
    }

