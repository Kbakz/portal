<?php
	$tabela = 'tb_admin.apoiadores';
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$apoiadores = Painel::selecionar($tabela,'id',$id);
	}else{
		header('location: '.INCLUDE_PATH_PAINEL);
		die();
	}
?>
<div class="conteudo-painel">
	<h2>Editar classificado <?php echo ucfirst($apoiadores['nome'])?></h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$link = $_POST['link'];
				$imagem_atual = $_POST['imagem_atual'];
				$imagem = $_FILES['imagem'];

				if($nome == '' || $link == ''){
					Painel::alert('erro','Campos vazios não são permitidos');
				}else if($imagem['name'] != ''){
					//existe imagem
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ? AND id != ?");
						$verificar->execute(array($nome,$id));
						if($verificar->rowCount() == 0){
							$sql = MySql::conectar()->prepare("UPDATE `$tabela` SET imagem = ?,nome = ?,link = ? WHERE id = ?");
							if($sql->execute(array($imagem,$nome,$link,$id))){
								Painel::alert('sucesso','Classificado atualizado com sucesso');
								$noticia = Painel::selecionar($tabela,'id',$id);
							}else{
								Painel::alert('erro','Ocorreu um erro ao atualizar');
							}
						}else{
							Painel::alert('erro','Já existe uma apoiador com esse nome');
						}
					}else{
						Painel::alert('erro','Imagem inválida');
					}
				}else{
					$imagem = $imagem_atual;
					$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ? AND id != ?");
					$verificar->execute(array($nome,$id));
					if($verificar->rowCount() == 0){
						$sql = MySql::conectar()->prepare("UPDATE `$tabela` SET imagem = ?,nome = ?,link = ? WHERE id = ?");
						if($sql->execute(array($imagem,$nome,$link,$id))){
							Painel::alert('sucesso','Classificado atualizado com sucesso');
							$noticia = Painel::selecionar($tabela,'id',$id);
						}else{
							Painel::alert('erro','Ocorreu um erro ao atualizar');
						}
					}else{
						Painel::alert('erro','Já existe uma apoiador com esse nome');
					}
				}
			}
		?>
		<label>Nome:</label>
		<input type="text" name="nome" value="<?php echo $apoiadores['nome'] ?>">
		<label>Link</label>
		<input type="text" name="link" value="<?php echo $apoiadores['link'] ?>">
		
		<label>Imagem:</label>
		<input type="file" name="imagem">
		<input type="hidden" name="imagem_atual" value="<?php echo $apoiadores['imagem']?>">

		<input type="submit" name="acao" value="Atualizar">
	</form>
</div><!--conteudo-painel-->