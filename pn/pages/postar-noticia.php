<?php
	Permissao::verificaPermissaoPagina(2);
	$tabela = 'tb_admin.noticias';
?>
<div class="conteudo-painel">
	<h2>Postar notícias</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$categoriaId = '';
				if(isset($_POST['categoria_id'])){
					$categoriaId = $_POST['categoria_id'];
				}
				$titulo = $_POST['titulo'];
				$conteudo = $_POST['conteudo'];
				$imagem = $_FILES['imagem'];
				$data = $_POST['data'];
				$autor = $_POST['autor'];

				if($categoriaId == ''){
					Painel::alert('erro','Adicione ou crie uma categoria');
				}else if($titulo == ''){
					Painel::alert('erro','Adicione um título');
				}else if($conteudo == ''){
					Painel::alert('erro','Adicione o conteudo');
				}else if($imagem['tmp_name'] == ''){
					Painel::alert('erro','Selecione uma imagem');
				}else{
					if(Painel::imagemValida($imagem)){
						$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE titulo = ? AND categoria_id = ?");
						$verificar->execute(array($titulo,$categoriaId));
						$verificar = $verificar->rowCount();
						if($verificar == 0){
							$slug = Painel::gerarSlug($titulo);
							$imagem = Painel::uploadFile($imagem);
							$sql = MySql::conectar()->prepare("INSERT INTO `$tabela` VALUES(null,?,?,?,?,?,?,false,?)");
							$sql->execute(array($categoriaId,$titulo,$conteudo,$imagem,$data,$autor,$slug));
							Painel::alert('sucesso','Notícia cadastrada com sucesso');
							header('location: '.INCLUDE_PATH_PAINEL.'postar-noticia?sucesso');
							die();

						}else{
							Painel::alert('erro','Já existe uma notícia com esse nome');
						}
					}else{
						Painel::alert('erro','Selecione uma imagem válida');
					}
					
				}

			}

			if(isset($_GET['sucesso']) && !isset($_POST['acao']))
				Painel::alert('sucesso','Cadastro realizado com sucesso');
		?>
		<label>Selecionar categoria:</label>
		<select name="categoria_id">
			<?php
				$categorias = MySql::conectar()->prepare("SELECT * FROM `tb_admin.categoria`");
				$categorias->execute();
				$categorias = $categorias->fetchAll();
				foreach ($categorias as $key => $value) {
			?>
			<option <?php if($value['id'] == @$categoriaId) echo 'selected';?> value="<?php echo $value['id'];?>"><?php echo $value['nome'];?></option>
			<?php
				}
			?>
		
		</select>
		<label>Título</label>
		<input type="text" name="titulo" value="<?php Painel::recover('titulo')?>">
		<label>Conteúdo:</label>
		<textarea id="tinymce" name="conteudo"><?php Painel::recover('conteudo')?></textarea>
		<label>Imagem:</label>
		<input type="file" name="imagem">

		<input type="hidden" name="data" value="<?php echo date('Y-m-d')?>">
		<input type="hidden" name="autor" value="<?php echo $_SESSION['nome']?>">
		<input type="hidden" name="destaque" value="false">
		<input type="submit" name="acao" value="Cadastrar">
	</form>

</div><!--conteudo-painel-->