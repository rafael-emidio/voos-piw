<?php
	require('conexao.php');
	$id= $_POST['id'];
	$numeroVoo = $_POST['numeroVoo'];
	$datav= $_POST['datav'];
	$assento= $_POST['assento'];

	$sql_edt="UPDATE ocupacao SET numeroVoo = '$numeroVoo', datav='$datav', assento='$assento' WHERE id='$id'";

	mysqli_query($conexao, $sql_edt) or die ('Erro na query: '.$sql_edt);
	header('Location: index.php?link=ocupacao');
?>