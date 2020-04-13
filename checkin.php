<h2><i class="fas fa-user-check"></i> Check-in</h2>
<?php
	if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "check") {
		$id=$_POST["id"];
  		$sql_upt ="SELECT * FROM passagem WHERE id='$id'";
   		$result_upt = mysqli_query($conexao,$sql_upt);

   		$sql_check ="SELECT * FROM checkin WHERE idPass='$id'";
   		$result_check = mysqli_query($conexao,$sql_check);
   		
   		if(mysqli_num_rows($result_upt) > 0 && mysqli_num_rows($result_check) < 1){
	   		$row_upt = mysqli_fetch_assoc($result_upt);
	   		$idVoo=$row_upt["idVoo"];
	   		$sql_voo = "SELECT * FROM voo WHERE id='$idVoo'";
	   		$result_voo = mysqli_query($conexao,$sql_voo);
	   		$row_voo = mysqli_fetch_assoc($result_voo);
	   		echo'
				<form method="post" action="index.php?link=checkin1">
				<div class="form-group">
				    <label for="inputIdPass">Número da passagem: </label>
				    <input type="text" name="idpass" class="form-control" id="inputIdPass" value='.$row_upt["id"].' readonly>
				</div>
				<div class="form-group">
				    <label for="inputNomePass">Nome do passageiro: </label>
				    <input type="text" name="nomepass" class="form-control" id="inputNomePass" value='.$row_upt["nomePass"].' readonly>
				</div>
				  <div class="form-group">
				    <label for="inputNumVoo">Número do voo: </label>
				    <input type="text" name="numeroVoo" class="form-control" id="inputNumVoo" value='.$row_voo["numero"].' readonly>
				</div>
				<div class="form-group">
				    <label for="inputData">Data do voo: </label>
				    <input type="date" name="datav" class="form-control" id="inputData" value='.$row_voo["datav"].' style="width: 200px;" readonly>
				</div>
				<div class="form-group">
				    <label for="inputHorario">Horário do voo: </label>
				    <input type="time" name="horario" class="form-control" id="inputHorario" value='.$row_voo["horario"].' style="width: 200px;" readonly>
				</div>
				<img src="img/assentos.jpg">
				<div class="form-group">

				    <label for="inputAssento">Assento: </label>
				    <input type="text" name="assento" class="form-control" id="inputAssento"  placeholder="Digite o assento desejado..." required>
				</div>
				<div class="form-group">
				    <label for="inputBag">Deseja comprar despache de bagagem: </label><br>
				    <input type="radio" name="bag" value="1" required> Sim<br>
					<input type="radio" name="bag" value="2"> Não<br>
				</div>
				<button type="submit" class="btn btn-primary w3-freen">Realizar Check-in</button>
				</form>';
		}else if(mysqli_num_rows($result_check) > 0){
				echo "<h3>O check-in da passagem de número $id ja foi realizado!</h3>";
				echo '<button type="submit" class="btn btn-primary w3-blue"><a href="?link=checkin"><i class="fas fa-arrow-left"></i> Ok</a></button>';
		}else{
				echo "<h3>A busca pela passagem de número $id não obteve resultado</h3><p>Por favor digite novamente o número da passagem</p>";
				echo '<button type="submit" class="btn btn-primary w3-blue"><a href="?link=checkin"><i class="fas fa-arrow-left"></i> Ok</a></button>';
		}
	}else{
		echo'
			<form method="post" action="index.php?link=checkin&act=check">
			  <div class="form-group">
			    <label for="inputId">Número da passagem: </label>
			    <input type="text" name="id" class="form-control" id="inputId" placeholder="Digite o número..." required>
			</div>
			<button type="submit" class="btn btn-primary">Continuar</button>
			</form>';
	}
?>