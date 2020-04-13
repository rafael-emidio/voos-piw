<h3><i class="fas fa-money-check-alt"></i> Relatório de vendas</h3>
<br/>
<script type="text/javascript">
	$(document).ready(function() {
		$("#inputData").change(function(){
		  $("#recarregar").click();	
		});
	});
</script>
<?php
	if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "data") {
		$today = $_POST["datav"];
		$sql_upt ="SELECT count(id) FROM passagem WHERE dataVenda='$today'";
	   	$result_upt = mysqli_query($conexao,$sql_upt);
	   	$row_upt = mysqli_fetch_assoc($result_upt);
	}else{
		$month = date('m');
		$day = date('d');
		$year = date('Y');
		$today = $year . '-' . $month . '-' . $day;
		$sql_upt ="SELECT count(id) FROM passagem WHERE dataVenda='$today'";
	   	$result_upt = mysqli_query($conexao,$sql_upt);
	   	$row_upt = mysqli_fetch_assoc($result_upt);
   	}
?>
<form method="post" action="index.php?link=relVenda&act=data">
	<div class="form-group">
		<h4>Vendas do dia:</h4>
		<input type="date" name="datav" class="form-control" id="inputData" value="<?php echo $today; ?>" style="width: 200px;"><br>
		<input type="text" id="totalv" class="form-control" value="<?php echo $row_upt["count(id)"]; ?>" style="width: 175px;" readonly="" />
		<button type="submit" id="recarregar" style="display: none;"></button>
	</div>
</form>