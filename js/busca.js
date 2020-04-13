$(function(){
	$("#tbl_dados input").keyup(function(){       
		var index = $(this).parent().index();
		var nth = "#tbl_dados td:nth-child("+(index+1).toString()+")";
		var valor = $(this).val().toUpperCase();
		$("#tbl_dados tbody tr").show();
		$(nth).each(function(){
			if($(this).text().toUpperCase().indexOf(valor) < 0){
				$(this).parent().hide();
			}
		});
	});

	$("#tbl_dados input").blur(function(){
		$(this).val("");
	});
});