<h2><i class="fas fa-user-check"></i> Check-in</h2>
<?php
		require('conexao.php');
		$bag=$_POST["bag"];
		if($bag==1 && !(isset($_REQUEST["act"]))){
			echo'
				<form method="post" action="index.php?link=checkin1&act=final">
				<input type="hidden" name="idpass" value='.$_POST["idpass"].'>
				<input type="hidden" name="assento" value='.$_POST["assento"].'>
				<input type="hidden" name="bag" value='.$_POST["bag"].'>
				<div class="form-group">
				    <label>Valor do despache da bagagem de 23kg: R$ 70,00 </label>
				</div>
				<div class="form-group">
					<label for="inputFormaPag">Forma de pagamento: </label>
					<select class="form-control" name="formaPag" id="inputFormaPag" style="width: 300px;" required>
					    <option value="" >Selecione a forma de pagamento</option>
					    <option value="1" >Cartão de Crédito</option>
					    <option value="2" >Dinheiro</option>
					    <option value="3" >Boleto</option>
					    <option value="4" >Depósito</option>
					    <option value="5" >Convênio</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary w3-freen">Comprar</button>
				</form>';
		}else if($bag==2){
			$idpass=$_POST["idpass"];
			$assento=$_POST["assento"];
			$bag=$_POST["bag"];

			$sql_cad="INSERT INTO checkin (idpass,assento,bag) VALUES ('$idpass', '$assento', '$bag')";
			mysqli_query($conexao, $sql_cad) or die ('Erro na query: '.$sql_cad);

			echo '<h3>Check-in realizado com sucesso!</h3>';
			echo '<button type="submit" class="btn btn-primary w3-blue"><a href="index.php?"><i class="fas fa-home"></i> Voltar a Home</a></button>';
		}
		if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "final") {
			$idpass=$_POST["idpass"];
			$assento=$_POST["assento"];
			$bag=$_POST["bag"];

			$sql_cad="INSERT INTO checkin (idpass,assento,bag) VALUES ('$idpass', '$assento', '$bag')";
			mysqli_query($conexao, $sql_cad) or die ('Erro na query: '.$sql_cad);

			echo '<h3>Check-in realizado com sucesso!</h3>';
			echo '<button type="submit" class="btn btn-primary w3-blue"><a href="index.php?"><i class="fas fa-home"></i> Voltar a Home</a></button>';
		}
?>