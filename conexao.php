<?php
$conexao=mysqli_connect('127.0.0.1', 'root', '', 'passagens');

mysqli_query($conexao, "SET NAMES 'utf-8'");
mysqli_query($conexao,  'SET character_set_connection=utf-8');
mysqli_query($conexao,  'SET character_set_client=utf-8');
mysqli_query($conexao,  'SET character_set_results=utf-8');

if (mysqli_connect_errno()){
	printf("A conexão com o banco de dados falhou: %s\n", mysqli_connect_error());
	exit;
  }
?>