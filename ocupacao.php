<h5>Cadastro de Ocupação de Voos</h5>
<?php
	if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "uptOcupacao") {
		$id=$_REQUEST["id"];
  		$sql_upt ="SELECT * FROM ocupacao WHERE id='$id'";
   		$result_upt = mysqli_query($conexao,$sql_upt);
   		$row_upt = mysqli_fetch_assoc($result_upt);	
   		echo'
			<form method="post" action="edtOcupacao.php">
			  <input type="hidden" name="id" value='.$row_upt["id"].'>
			  <div class="form-group">
			    <label for="inputNumVoo">Número do voo: </label>
			    <input type="text" name="numeroVoo" class="form-control" id="inputNumVoo" value='.$row_upt["numeroVoo"].' required>
			</div>
			<div class="form-group">
			    <label for="inputData">Data do voo: </label>
			    <input type="date" name="datav" class="form-control" id="inputData" value='.$row_upt["datav"].' style="width: 200px;" required>
			</div>
			<div class="form-group">
			    <label for="inputAssento">Assento escolhido: </label>
			    <input type="text" name="assento" class="form-control" id="inputAssento"  value='.$row_upt["assento"].' required>
			</div>
			<button type="submit" class="btn btn-primary w3-orange">Atualizar</button>
			</form>';
	}else{
		echo'
			<form method="post" action="cadOcupacao.php">
			  <div class="form-group">
			    <label for="inputNumVoo">Número do voo: </label>
			    <input type="text" name="numeroVoo" class="form-control" id="inputNumVoo" placeholder="Digite o número..." required>
			</div>
			<div class="form-group">
			    <label for="inputData">Data do voo: </label>
			    <input type="date" name="datav" class="form-control" id="inputData" style="width: 200px;" required>
			</div>
			<div class="form-group">
			    <label for="inputAssento">Assento escolhido: </label>
			    <input type="text" name="assento" class="form-control" id="inputAssento"  placeholder="Digite o assento..." required>
			</div>
			<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>';
	}
?>
<br/>
<h4><i class="fas fa-chair"></i> Lista de Ocupações</h4>
<table id="tbl_dados" class="w3-table-all">
	<tr>
		<th><input type="text" id="txtColuna1" placeholder="Buscar por Numero" style="width: 170px;" /></th>
		<th></th>
		<th><input type="text" id="txtColuna2" placeholder="Buscar por Assento" style="width: 170px;"/></th>
		<th></th>
	</tr>
	<tr>
		<th>Número do Voo</th>
		<th>Data</th>
		<th>Assento</th>
		<th>Ações</th>
	</tr>
	<?php

	$sql_rec="select * from ocupacao order by id";
    $consulta=mysqli_query($conexao,$sql_rec);

	if (mysqli_num_rows($consulta) > 0) {
		while($row = mysqli_fetch_assoc($consulta)){
			echo '<tr>';
			echo '<td>'.$row["numeroVoo"].'</td>';
			echo '<td>'.$row["datav"].'</td>';
			echo '<td>'.$row["assento"].'</td>';
			echo '<td>
			<a href="index.php?link=ocupacao&act=uptOcupacao&id='.$row["id"].'" class="w3-button w3-green"><i class="fas fa-edit"></i> Editar</a>
			<a href="delOcupacao.php?id='.$row["id"].'" class="w3-button w3-red"><i class="fas fa-trash-alt"></i> Excluir</a>
			</td>';

			echo '</tr>';
		}
	} else{
		echo "<tr><td colspan='6'><center>Nenhum avião cadastrado</center></td></tr>";
	}
	?>
</table>