<?php
	require('conexao.php');
	$idVoo = $_POST['id'];
	$nomePass = $_POST['nomePass'];
	$numeroDoc= $_POST['numeroDoc'];
	$dataNasc= $_POST['data'];
	$dataVenda= $_POST['dataVenda'];
	$formaPag= $_POST['formaPag'];
	$total= $_POST['total'];

	$sql_cad="INSERT INTO passagem (idVoo,nomePass,numeroDoc,dataNasc,dataVenda,formaPag,total) VALUES ('$idVoo', '$nomePass', '$numeroDoc', '$dataNasc', '$dataVenda', '$formaPag', '$total')";
	mysqli_query($conexao, $sql_cad) or die ('Erro na query: '.$sql_cad);
	echo '<h3>Venda realizada com sucesso!</h3><h4>O número da sua passagem é: '.mysqli_insert_id($conexao).'</h4>';
	echo '<button type="submit" class="btn btn-primary w3-blue"><a href="?link=venda"><i class="fas fa-money-bill-wave"></i> Comprar mais</a></button>'
?>