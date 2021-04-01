<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_site.config';
	$info = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
	$info->execute();
	$info = $info->fetch();
?>
<div class="conteudo-painel">
	<h2>Editar site</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$descricao = $_POST['descricao'];
				$icone1 = $_POST['icone1'];
				$icone2 = $_POST['icone2'];
				$icone3 = $_POST['icone3'];
				$social_1 = $_POST['link1'];
				$social_2 = $_POST['link2'];
				$social_3 = $_POST['link3'];
				$imagem_atual = $_POST['imagem_atual'];
				$imagem = $_FILES['imagem'];
				
				if($imagem['name'] != ''){
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						$sql = MySql::conectar()->prepare("UPDATE `$tabela` SET img_sobre = ?,texto_sobre = ?,icone1 = ?,social_1 = ?,icone2 = ?,social_2 = ?,icone3 = ?,social_3 = ?");
						$sql->execute(array($imagem,$descricao,$icone1,$social_1,$icone2,$social_2,$icone3,$social_3));
						Painel::alert('sucesso','Página atualizada com sucesso');
						$info = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
	$info->execute();
	$info = $info->fetch();
					}else{
						Painel::alert('erro','Formato de imagem invalido');
					}
				}else{
					$imagem = $imagem_atual;
					$sql = MySql::conectar()->prepare("UPDATE `$tabela` SET img_sobre = ?,texto_sobre = ?,icone1 = ?,social_1 = ?,icone2 = ?,social_2 = ?,icone3 = ?,social_3 = ?");
					$sql->execute(array($imagem,$descricao,$icone1,$social_1,$icone2,$social_2,$icone3,$social_3));
					Painel::alert('sucesso','Página atualizada com sucesso');
					$info = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
	$info->execute();
	$info = $info->fetch();
				}
			}
		?>

		<label>Descrição:</label>
		<textarea name="descricao"><?php echo $info['texto_sobre']?></textarea>
		<label>Icone 1:</label>
		<input type="text" name="icone1" value="<?php echo $info['icone1']?>">
		<label>link 1:</label>
		<input type="text" name="link1" value="<?php echo $info['social_1']?>">

		<label>Icone 2:</label>
		<input type="text" name="icone2" value="<?php echo $info['icone2']?>">
		<label>link 2:</label>
		<input type="text" name="link2" value="<?php echo $info['social_2']?>">

		<label>Icone 3:</label>
		<input type="text" name="icone3" value="<?php echo $info['icone3']?>">
		<label>link 3:</label>
		<input type="text" name="link3" value="<?php echo $info['social_3']?>">

		<label>Imagem (Quem somos)</label>
		<input type="file" name="imagem">
		<input type="hidden" name="imagem_atual" value="<?php echo $info['img_sobre']?>">
		<input type="submit" name="acao" value="Atualizar">
	</form>
</div><!--conteudo-painel-->