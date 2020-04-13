<script type="text/javascript">
	$(document).ready(function() {
		$("#inputNumDoc").change(function(){
			if(!(TestaCPF($(this).val()))){
				alert('CPF inválido por favor digite novamente.');
				$(this).val("");
			}
		});
	});
	function TestaCPF(strCPF) {
		var Soma;
		var Resto;
		Soma = 0;
		if (strCPF == "00000000000") return false;
		
		for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
			Resto = (Soma * 10) % 11;
		
		if ((Resto == 10) || (Resto == 11))  Resto = 0;
		if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
		
		Soma = 0;
		for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
			Resto = (Soma * 10) % 11;
		
		if ((Resto == 10) || (Resto == 11))  Resto = 0;
		if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
		return true;
	}
</script>
<h3>Venda de passagens</h3>
<button type="submit" class="btn btn-primary w3-blue"><a href="?link=venda"><i class="fas fa-arrow-left"></i> Voltar</a></button>
<?php
	if (isset($_REQUEST["act"]) && isset($_REQUEST["tipo"]) && isset($_REQUEST["id"]) && $_REQUEST["act"] == "vender") {
		$id=$_REQUEST["id"];
		$tipo=$_REQUEST["tipo"];
  		$sql_upt ="SELECT * FROM voo WHERE id='$id'";
   		$result_upt = mysqli_query($conexao,$sql_upt);
   		$row_upt = mysqli_fetch_assoc($result_upt);
   		$month = date('m');
		$day = date('d');
		$year = date('Y');

		$today = $year . '-' . $month . '-' . $day;
   		echo'
   		<form method="post" action="index.php?link=vender">
   				<input type="hidden" name="id" value='.$row_upt["id"].'>
   				<input type="date" name="dataVenda" value='.$today.' class="form-control" id="dataVenda" style="display: none;">
   				<div class="form-group">
					<label for="inputNumDoc">CPF: </label>
					<input type="text" name="numeroDoc" class="form-control" id="inputNumDoc" placeholder="Digite o CPF..." required>
				</div>
				<div class="form-group">
					<label for="inputNomePass">Nome do passageiro: </label>
					<input type="text" name="nomePass" class="form-control" id="inputNomePass" placeholder="Digite o nome do passageiro..." required>
				</div>
				<div class="form-group">
					<label for="inputDataNasc">Data de nascimento: </label>
					<input type="date" name="data" class="form-control" id="inputDataNasc" style="width: 200px;" required>
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
				<div class="form-group">
					<label for="inputNumVoo">Número do voo: </label>
					<input type="text" name="numero" class="form-control" id="inputNumVoo" value='.$row_upt["numero"].' readonly>
				</div>
				<div class="form-group">
					<label for="inputData">Data da viagem: </label>
					<input type="date" class="form-control" id="inputData" value='.$row_upt["datav"].' style="width: 200px;" readonly>
				</div>
				<div class="form-group">
					<label for="inputHora">Horário da viagem: </label>
					<input type="time" name="horario" class="form-control" id="inputHora" value='.$row_upt["horario"].' style="width: 100px;" readonly>
				</div>
				<div class="form-group">
					<label for="inputPartida">Local Partida: </label>
					<input type="text" name="origem" class="form-control" id="inputPartida" value='.$row_upt["origem"].' readonly>
				</div>
				<div class="form-group">
					<label for="inputDestino">Local Destino: </label>
					<input type="text" name="destino" class="form-control" id="inputDestino"  value='.$row_upt["destino"].' readonly>
				</div>
				<div class="form-group">
					<label for="inputTotal">Total: </label>';
				if($tipo == "normal"){
					echo '<input type="number" id="total" name="total" class="form-control" id="inputTotal" value='.$row_upt["valor"].' style="width: 100px;" readonly>';
				}else{
					echo '<input type="number" id="total" name="total" class="form-control" id="inputTotal" value='.$row_upt["valorEsp"].' style="width: 100px;" readonly>';
				}
				echo '</div>
				<button type="submit" class="btn btn-primary w3-green">Comprar</button>
			</form>';
	 }else{
	 	echo'<h2>Escolha o Voo para comprar a Passagem!</h2>';
	 }
 ?>
<br/>
