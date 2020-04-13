<?php
	require('conexao.php');
	$id = $_REQUEST["id"];

	$sql_del="DELETE FROM voo WHERE id = '$id'";

	mysqli_query($conexao, $sql_del) or die ('Erro na query: '.$sql_del);
	header('Location: index.php?link=voo');
?>