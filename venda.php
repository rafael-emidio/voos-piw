<h3>Venda de passagens</h3>
<h4><i class="fas fa-plane-departure"></i> Lista de Voos</h4>
<table id="tbl_dados" class="w3-table-all">
	<tr>
		<th><input type="text" id="txtColuna1" placeholder="Buscar Numero" style="width: 135px;" /></th>
		<th><input type="text" id="txtColuna2" placeholder="Buscar Data" style="width: 135px;"/></th>
		<th></th>
		<th><input type="text" id="txtColuna3" placeholder="Buscar origem" style="width: 135px;"/></th>
		<th><input type="text" id="txtColuna4" placeholder="Buscar destino" style="width: 135px;"/></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<th>Numero</th>
		<th>Data</th>
		<th>Horario</th>
		<th>Origem</th>
		<th>Destino</th>
		<th>Valor Normal</th>
		<th>Valor Especial</th>
		<th>Comprar</th>
	</tr>
	<?php

	$sql_rec="select * from voo order by id";
    $consulta=mysqli_query($conexao,$sql_rec);

	if (mysqli_num_rows($consulta) > 0) {
		while($row = mysqli_fetch_assoc($consulta)){
			echo '<tr>';
			echo '<td>'.$row["numero"].'</td>';
			echo '<td>'.$row["datav"].'</td>';
			echo '<td>'.$row["horario"].'</td>';
			echo '<td>'.$row["origem"].'</td>';
			echo '<td>'.$row["destino"].'</td>';
			echo '<td>'.$row["valor"].'</td>';
			echo '<td>'.$row["valorEsp"].'</td>';
			echo '<td>
			<a href="index.php?link=vendaPass&act=vender&id='.$row["id"].'&tipo=normal" class="w3-button w3-blue"><i class="fas fa-user"></i> Comprar Normal</a>
			<a href="index.php?link=vendaPass&act=vender&id='.$row["id"].'&tipo=especial" class="w3-button w3-green"><i class="fas fa-user-tag"></i> Comprar Especial</a>
			</td>';

			echo '</tr>';
		}
	} else{
		echo "<tr><td colspan='8'><center>Nenhum voo disponível</center></td></tr>";
	}
	?>
</table>