<?php
	require('conexao.php');
	$id= $_POST['id'];
	$registro = $_POST['registro'];
	$modelo= $_POST['modelo'];
	$assentos= $_POST['assentos'];
	$assentosesp= $_POST['assentosesp'];

	$sql_edt="UPDATE aviao SET registro = '$registro', modelo='$modelo', assentos='$assentos', assentosEsp = '$assentosesp' WHERE id='$id'";

	mysqli_query($conexao, $sql_edt) or die ('Erro na query: '.$sql_edt);
	header('Location: index.php?link=aviao');
?>