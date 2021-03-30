<?php
	Permissao::verificaPermissaoPagina(2);
?>
<div class="conteudo-painel">
	<h2>Postar notícias</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$categoria = $_POST['categoria'];
				$titulo = $_POST['titulo'];
				$conteudo = $_POST['conteudo'];
				$imagem = $_FILES['imagem'];
				$data = $_POST['data'];
				$autor = $_POST['autor'];

			}
		?>
		<label>Selecionar categoria:</label>
		<select name="categoria">
			<option></option>
		</select>
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