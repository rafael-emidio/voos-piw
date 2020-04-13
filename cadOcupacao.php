<?php
	require('conexao.php');
	$numeroVoo = $_POST['numeroVoo'];
	$datav= $_POST['datav'];
	$assento= $_POST['assento'];

	$sql_cad="INSERT INTO ocupacao (numeroVoo,datav,assento) VALUES ('$numeroVoo', '$datav', '$assento')";

	mysqli_query($conexao, $sql_cad) or die ('Erro na query: '.$sql_cad);
	header('Location: index.php?link=ocupacao');
?>