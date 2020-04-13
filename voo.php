<h5>Cadastro de Voos</h5>
<?php
	if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "uptVoo") {
		$id=$_REQUEST["id"];
  		$sql_upt ="SELECT * FROM voo WHERE id='$id'";
   		$result_upt = mysqli_query($conexao,$sql_upt);
   		$row_upt = mysqli_fetch_assoc($result_upt);
   		echo'
   		<form method="post" action="edtVoo.php">
   				<input type="hidden" name="id" value='.$row_upt["id"].'>
				<div class="form-group">
					<label for="inputNumVoo">Número do voo: </label>
					<input type="text" name="numero" class="form-control" id="inputNumVoo" value='.$row_upt["numero"].' required>
				</div>
				<div class="form-group">
					<label for="inputNumAviao">Registro do Avião: </label>
					<input type="text" name="numeroAviao" class="form-control" id="inputNumAviao" value='.$row_upt["numeroAviao"].' required>
				</div>
				<div class="form-group">
					<label for="inputData">Data da viagem: </label>
					<input type="date" name="data" class="form-control" id="inputData" value='.$row_upt["datav"].' style="width: 200px;" required>
				</div>
				<div class="form-group">
					<label for="inputHora">Horário da viagem: </label>
					<input type="time" name="horario" class="form-control" id="inputHora" value='.$row_upt["horario"].' style="width: 100px;" required>
				</div>
				<div class="form-group">
					<label for="inputPartida">Local Partida: </label>
					<input type="text" name="origem" class="form-control" id="inputPartida" value='.$row_upt["origem"].' required>
				</div>
				<div class="form-group">
					<label for="inputDestino">Local Destino: </label>
					<input type="text" name="destino" class="form-control" id="inputDestino"  value='.$row_upt["destino"].' required>
				</div>
				<div class="form-group">
					<label for="inputValor">Valor da passagem Normal: </label>
					<input type="number" name="valor" class="form-control" id="inputValor" value='.$row_upt["valor"].' min="1" style="width: 100px;" required>
				</div>
				<div class="form-group">
					<label for="inputValorEsp">Valor da passagem Especial: </label>
					<input type="number" name="valoresp" class="form-control" id="inputValorEsp" value='.$row_upt["valorEsp"].' min="1" style="width: 100px;" required>
				</div>
				<button type="submit" class="btn btn-primary w3-orange">Atualizar</button>
			</form>';
	 }else{
	 	echo'
			<form method="post" action="cadVoo.php">
				<div class="form-group">
					<label for="inputNumVoo">Número do voo: </label>
					<input type="text" name="numero" class="form-control" id="inputNumVoo" placeholder="Digite o número..." required>
				</div>
				<div class="form-group">
					<label for="inputNumAviao">Registro do Avião: </label>
					<input type="text" name="numeroAviao" class="form-control" id="inputNumAviao" placeholder="Digite o registro..." required>
				</div>
				<div class="form-group">
					<label for="inputData">Data da viagem: </label>
					<input type="date" name="data" class="form-control" id="inputData" style="width: 200px;" required>
				</div>
				<div class="form-group">
					<label for="inputHora">Horário da viagem: </label>
					<input type="time" name="horario" class="form-control" id="inputHora" style="width: 100px;" required>
				</div>
				<div class="form-group">
					<label for="inputPartida">Local Partida: </label>
					<input type="text" name="origem" class="form-control" id="inputPartida" placeholder="Digite a origem..." required>
				</div>
				<div class="form-group">
					<label for="inputDestino">Local Destino: </label>
					<input type="text" name="destino" class="form-control" id="inputDestino"  placeholder="Digite o destino..."required>
				</div>
				<div class="form-group">
					<label for="inputValor">Valor da passagem Normal: </label>
					<input type="number" name="valor" class="form-control" id="inputValor" value="90" min="1" style="width: 100px;" required>
				</div>
				<div class="form-group">
					<label for="inputValorEsp">Valor da passagem Especial: </label>
					<input type="number" name="valoresp" class="form-control" id="inputValorEsp" value="90" min="1" style="width: 100px;" required>
				</div>
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>';
	 }
 ?>
<br/>
<h4><i class="fas fa-plane-departure"></i> Lista de Voos</h4>
<table id="tbl_dados" class="w3-table-all">
	<tr>
		<th><input type="text" id="txtColuna1" placeholder="Buscar Numero" style="width: 135px;" /></th>
		<th></th>
		<th></th>
		<th><input type="text" id="txtColuna2" placeholder="Buscar origem" style="width: 135px;"	/></th>
		<th><input type="text" id="txtColuna3" placeholder="Buscar destino" style="width: 135px;"	/></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<th>Numero</th>
		<th>Registro Avião</th>
		<th>Data</th>
		<th>Horario</th>
		<th>Origem</th>
		<th>Destino</th>
		<th>Valor</th>
		<th>Valor Especial</th>
		<th>Ações</th>
	</tr>
	<?php

	$sql_rec="select * from voo order by id";
    $consulta=mysqli_query($conexao,$sql_rec);

	if (mysqli_num_rows($consulta) > 0) {
		while($row = mysqli_fetch_assoc($consulta)){
			echo '<tr>';
			echo '<td>'.$row["numero"].'</td>';
			echo '<td>'.$row["numeroAviao"].'</td>';
			echo '<td>'.$row["datav"].'</td>';
			echo '<td>'.$row["horario"].'</td>';
			echo '<td>'.$row["origem"].'</td>';
			echo '<td>'.$row["destino"].'</td>';
			echo '<td>'.$row["valor"].'</td>';
			echo '<td>'.$row["valorEsp"].'</td>';
			echo '<td>
			<a href="index.php?link=voo&act=uptVoo&id='.$row["id"].'" class="w3-button w3-green"><i class="fas fa-edit"></i> Editar</a>
			<a href="delVoo.php?id='.$row["id"].'" class="w3-button w3-red"><i class="fas fa-trash-alt"></i> Excluir</a>
			</td>';

			echo '</tr>';
		}
	} else{
		echo "<tr><td colspan='8'><center>Nenhum voo cadastrado</center></td></tr>";
	}
	?>
</table>