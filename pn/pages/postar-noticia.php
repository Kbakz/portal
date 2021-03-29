<div class="conteudo-painel">
	<h2>Postar notícias</h2>

	<form method="post" enctype="multipart/form-data">	
		<label>Título</label>
		<input type="text" name="titulo">
		<label>Conteúdo:</label>
		<textarea name="conteudo"></textarea>
		<label>Imagem:</label>
		<input type="file" name="imagem">

		<input type="hidden" name="data" value="<?php echo date('Y-m-d')?>">
		<input type="hidden" name="autor" value="<?php echo $_SESSION['nome']?>">

		<input type="submit" name="acao" value="Cadastrar">
	</form>
	
</div><!--conteudo-painel-->