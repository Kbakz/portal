<?php
	$tabela = 'tb_admin.noticias';
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$noticia = Painel::selecionar($tabela,'id',$id);
	}else{
		header('location: '.INCLUDE_PATH_PAINEL);
		die();
	}
?>
<div class="conteudo-painel">
	<h2>Editar notícia <?php echo ucfirst($noticia['titulo'])?></h2>

	<form method="post" enctype="multipart/form-data">
		<label><b>Autor: </b><?php echo ucfirst($noticia['autor']);?></label>
		<label><b>Postado em: </b><?php echo date('d/m/Y',strtotime($noticia['data']));?></label>
		<?php
			if(isset($_POST['acao'])){
				$categoria_id = $_POST['categoria_id'];
				$titulo = $_POST['titulo'];
				$lide = $_POST['lide'];
				$conteudo = $_POST['conteudo'];
				$fonte_imagem = $_POST['fonte-imagem'];
				$imagem_atual = $_POST['imagem_atual'];
				$imagem = $_FILES['imagem'];

				if($titulo == '' || $conteudo == ''){
					Painel::alert('erro','Campos vazios não são permitidos');
				}else if($imagem['name'] != ''){
					//existe imagem
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE titulo = ? AND categoria_id = ? AND id != ?");
						$verificar->execute(array($titulo,$categoria_id,$id));
						if($verificar->rowCount() == 0){
							$slug = Painel::gerarSlug($titulo);
							$sql = MySql::conectar()->prepare("UPDATE `$tabela` SET categoria_id = ?,titulo = ?, lide = ?,conteudo = ?, imagem = ?,fonte = ?,slug = ? WHERE id = ?");
							if($sql->execute(array($categoria_id,$titulo,$lide,$conteudo,$imagem,$fonte_imagem,$slug,$id))){
								if(isset($_POST['destaque']) && $_POST['destaque'] == 'true'){
									$destaque = $sql = MySql::conectar()->prepare("UPDATE `$tabela` SET destaque = 'true' WHERE id = ?");
									$destaque->execute(array($id));
									$destaque = $sql = MySql::conectar()->prepare("UPDATE `$tabela` SET destaque = 'false' WHERE id != ?");
									$destaque->execute(array($id));
								}else{
									$destaque = $sql = MySql::conectar()->prepare("UPDATE `$tabela` SET destaque = 'false' WHERE id = ?");
									$destaque->execute(array($id));
								}
								Painel::alert('sucesso','Notícia atualizada com sucesso');
								$noticia = Painel::selecionar($tabela,'id',$id);
							}else{
								Painel::alert('erro','Ocorreu um erro ao atualizar');
							}
						}else{
							Painel::alert('erro','Já existe uma noticia com esse nome');
						}
					}else{
						Painel::alert('erro','Imagem inválida');
					}
				}else{
					$imagem = $imagem_atual;
					$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE titulo = ? AND categoria_id = ? AND id != ?");
					$verificar->execute(array($titulo,$categoria_id,$id));
					$verificar = $verificar->rowCount();
					if($verificar == 0){
						$slug = Painel::gerarSlug($titulo);
						$sql = MySql::conectar()->prepare("UPDATE `$tabela` SET categoria_id = ?,titulo = ?, lide = ?,conteudo = ?, imagem = ?,fonte = ?,slug = ? WHERE id = ?");
						
						if($sql->execute(array($categoria_id,$titulo,$lide,$conteudo,$imagem,$fonte_imagem,$slug,$id))){
							if(isset($_POST['destaque']) && $_POST['destaque'] == 'true'){
								$destaque = $sql = MySql::conectar()->prepare("UPDATE `$tabela` SET destaque = 'true' WHERE id = ?");
								$destaque->execute(array($id));
								$destaque = $sql = MySql::conectar()->prepare("UPDATE `$tabela` SET destaque = 'false' WHERE id != ?");
								$destaque->execute(array($id));
							}else{
								$destaque = $sql = MySql::conectar()->prepare("UPDATE `$tabela` SET destaque = 'false' WHERE id = ?");
								$destaque->execute(array($id));
							}
							Painel::alert('sucesso','Notícia atualizada com sucesso');
							$noticia = Painel::selecionar($tabela,'id',$id);
						}else{
							Painel::alert('erro','Ocorreu um erro ao atualizar');
						}
					}else{
						Painel::alert('erro','Já existe uma notícia com esse nome');
					}
				}
			}
		?>

		<label>Selecionar categoria:</label>
		<select name="categoria_id">
			<?php
				$categorias = MySql::conectar()->prepare("SELECT * FROM `tb_admin.categoria`");
				$categorias->execute();
				$categorias = $categorias->fetchAll();
				foreach ($categorias as $key => $value) {
			?>
			<option <?php if($value['id'] == @$noticia['categoria_id']) echo 'selected';?> value="<?php echo $value['id'];?>"><?php echo $value['nome'];?></option>
			<?php
				}
			?>
		
		</select>
		<label>Título:</label>
		<input type="text" name="titulo" value="<?php echo $noticia['titulo'] ?>">
		<label>Lide:</label>
		<textarea style="height: 120px" name="lide"><?php echo $noticia['lide'] ?></textarea>
		<label>Conteúdo:</label>
		<textarea id="tinymce" name="conteudo"><?php echo $noticia['conteudo'] ?></textarea>
		<label>Tornar notícia destaque:</label>
		<input type="checkbox" name="destaque" value="true" id="destaque" <?php if($noticia['destaque'] == 'true') echo 'checked'?>>
		<label for="destaque" class="destaque">Destaque</label>
		<label>Fonte da imagem:</label>
		<input type="text" name="fonte-imagem" value="<?php echo $noticia['fonte'] ?>">
		<label>Imagem:</label>
		<input type="file" name="imagem">
		<input type="hidden" name="imagem_atual" value="<?php echo $noticia['imagem']?>">

		<input type="submit" name="acao" value="Atualizar">
	</form>
</div><!--conteudo-painel-->