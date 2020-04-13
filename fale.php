<h3>Insira os dados e nos envie suas dúvidas, sugestões ou reclamações.</h3>
<form method="post" action="index.php?link=fale">
<div class="form-group">
	<label for="inputEmail">Email</label>
	<input type="email" class="form-control" id="inputEmail" placeholder="Digite seu email..." required>
	<small class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
</div>
<div class="form-group">
	<label for="inputNome">Nome</label>
	<input type="text" class="form-control" id="inputNome" placeholder="Digite seu nome..." required>
</div>
<div class="form-group">
	<label for="texto">Dúvidas, sugestões ou reclamações:</label>
	<textarea class="form-control" id="texto" name="texto" rows="7" style="width: 400px;"></textarea>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>