<?php
	require('conexao.php');
	$id= $_POST['id'];
	$numero = $_POST['numero'];
	$numeroAviao = $_POST['numeroAviao'];
	$datav= $_POST['data'];
	$horario= $_POST['horario'];
	$origem= $_POST['origem'];
	$destino= $_POST['destino'];
	$valor= $_POST['valor'];
	$valoresp= $_POST['valoresp'];

	$sql_edt="UPDATE voo SET numero = '$numero', numeroAviao='$numeroAviao', datav='$datav', horario='$horario', origem = '$origem', destino = '$destino', valor = '$valor', valorEsp = '$valoresp' WHERE id='$id'";

	mysqli_query($conexao, $sql_edt) or die ('Erro na query: '.$sql_edt);
	header('Location: index.php?link=voo');
?>