<?php
	require('conexao.php');
	$registro = $_POST['registro'];
	$modelo= $_POST['modelo'];
	$assentos= $_POST['assentos'];
	$assentosesp= $_POST['assentosesp'];

	$sql_cad="INSERT INTO aviao (registro,modelo,assentos,assentosesp) VALUES ('$registro', '$modelo', $assentos, $assentosesp)";

	mysqli_query($conexao, $sql_cad) or die ('Erro na query: '.$sql_cad);
	header('Location: index.php?link=aviao');
?>