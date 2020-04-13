<?php
	require('conexao.php');
	$numero = $_POST['numero'];
	$numeroAviao = $_POST['numeroAviao'];
	$datav = $_POST['data'];
	$horario= $_POST['horario'];
	$origem= $_POST['origem'];
	$destino= $_POST['destino'];
	$valor= $_POST['valor'];
	$valoresp= $_POST['valoresp'];

	$sql_cad="INSERT INTO voo (numero,numeroAviao,datav,horario,origem,destino,valor,valorEsp) VALUES ('$numero', '$numeroAviao', '$datav', '$horario', '$origem', '$destino', $valor, $valoresp)";
	 mysqli_query($conexao, $sql_cad) or die ('Erro na query: '.$sql_cad);
	header('Location: index.php?link=voo');
?>