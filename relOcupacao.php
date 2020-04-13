<h3><i class="fas fa-users"></i> Relatório de ocupação</h3>
<br/>
<table id="tbl_dados" class="w3-table-all">
	<tr>
		<th><input type="text" id="txtColuna1" placeholder="Buscar Numero" style="width: 135px;" /></th>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<th>Numero do voo</th>
		<th>Capacidade</th>
		<th>Assentos Ocupados</th>
	</tr>
	<?php

	$sql_rec="select * from voo order by id";
    $consulta=mysqli_query($conexao,$sql_rec);

	if (mysqli_num_rows($consulta) > 0) {
		while($row = mysqli_fetch_assoc($consulta)){
			$numVoo = $row["numero"];
			$sql_ocp="select count(id) from ocupacao where numeroVoo='$numVoo'";
    		$consulta_ocp=mysqli_query($conexao,$sql_ocp);
    		$row_ocp = mysqli_fetch_assoc($consulta_ocp);

			$numAviao = $row["numeroAviao"];
    		$sql_aviao="select assentos, assentosEsp from aviao where registro='$numAviao'";
    		$consulta_aviao=mysqli_query($conexao,$sql_aviao);
    		$row_aviao = mysqli_fetch_assoc($consulta_aviao);
    		$capacidade = $row_aviao["assentos"] + $row_aviao["assentosEsp"];
    		
			echo '<tr>';
			echo '<td>'.$row["numero"].'</td>';
			echo '<td>'.$capacidade.'</td>';
			echo '<td>'.$row_ocp["count(id)"].'</td></tr>';
		}
	} else{
		echo "<tr><td colspan='3'><center>Nenhum voo cadastrado</center></td></tr>";
	}
	?>
</table>