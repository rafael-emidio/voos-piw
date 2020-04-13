<h5>Cadastro de Aviões</h5>
<?php
	if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "uptAviao") {
		$id=$_REQUEST["id"];
  		$sql_upt ="SELECT * FROM aviao WHERE id='$id'";
   		$result_upt = mysqli_query($conexao,$sql_upt);
   		$row_upt = mysqli_fetch_assoc($result_upt);	
   		echo'
   		<form  method="post" action="edtAviao.php">
   			<input type="hidden" name="id" value='.$row_upt["id"].'>
			<div class="form-group">
				<label for="inputNumReg">Número de registro: </label>
				<input type="text" class="form-control" name="registro" id="inputNumReg" value='.$row_upt["registro"].' required>
			</div>
			<div class="form-group">
				<label for="inputModelo">Modelo: </label>
				<input type="text" class="form-control" name="modelo" id="inputModelo" value='.$row_upt["modelo"].' required>
			</div>
			<div class="form-group">
				<label for="inputAssentos">Quantidade de assentos: </label>
				<input type="number" class="form-control" name="assentos" id="inputAssentos" value='.$row_upt["assentos"].' min="2" style="width: 100px;" required>
			</div>
			<div class="form-group">
				<label for="inputAssentosEsp">Quantidade de assentos especiais: </label>
				<input type="number" class="form-control" name="assentosesp" id="inputAssentosEsp" value='.$row_upt["assentosEsp"].' min="2" style="width: 100px;" required>
			</div>
			<button type="submit" class="btn btn-primary w3-orange">Atualizar</button>
		</form>';
	 }else{
	 	echo'
	 	<form  method="post" action="cadAviao.php">
			<div class="form-group">
				<label for="inputNumReg">Número de registro: </label>
				<input type="text" class="form-control" name="registro" id="inputNumReg" placeholder="Digite o registro..." required>
			</div>
			<div class="form-group">
				<label for="inputModelo">Modelo: </label>
				<input type="text" class="form-control" name="modelo" id="inputModelo" placeholder="Digite o modelo..." required>
			</div>
			<div class="form-group">
				<label for="inputAssentos">Quantidade de assentos: </label>
				<input type="number" class="form-control" name="assentos" id="inputAssentos" value="100" min="2" style="width: 100px;" required>
			</div>
			<div class="form-group">
				<label for="inputAssentosEsp">Quantidade de assentos especiais: </label>
				<input type="number" class="form-control" name="assentosesp" id="inputAssentosEsp" value="15" min="2" style="width: 100px;" required>
			</div>
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>';
	 }
 ?>
<br/>
<h4><i class="fas fa-plane"></i> Lista de Aviões</h4>
<table id="tbl_dados" class="w3-table-all">
	<tr>
		<th><input type="text" id="txtColuna1" placeholder="Buscar por Registro" style="width: 175px;"/></th>
		<th><input type="text" id="txtColuna2" placeholder="Buscar por modelo" style="width: 165px;"/></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<th>Registro</th>
		<th>Modelo</th>
		<th>Assentos</th>
		<th>Assentos Especiais</th>
		<th>Ações</th>
	</tr>
	<?php

	$sql_rec="select * from aviao order by id";
    $consulta=mysqli_query($conexao,$sql_rec);

	if (mysqli_num_rows($consulta) > 0) {
		while($row = mysqli_fetch_assoc($consulta)){
			echo '<tr>';
			echo '<td>'.$row["registro"].'</td>';
			echo '<td>'.$row["modelo"].'</td>';
			echo '<td>'.$row["assentos"].'</td>';
			echo '<td>'.$row["assentosEsp"].'</td>';
			echo '<td>
			<a href="index.php?link=aviao&act=uptAviao&id='.$row["id"].'" class="w3-button w3-green"><i class="fas fa-edit"></i> Editar</a>
			<a href="delAviao.php?id='.$row["id"].'" class="w3-button w3-red"><i class="fas fa-trash-alt"></i> Excluir</a>
			</td>';

			echo '</tr>';
		}
	} else{
		echo "<tr><td colspan='6'><center>Nenhum avião cadastrado</center></td></tr>";
	}
	?>
</table>