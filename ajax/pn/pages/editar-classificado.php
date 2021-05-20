<?php
	$tabela = 'tb_admin.classificados';
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$classificados = Painel::selecionar($tabela,'id',$id);
	}else{
		header('location: '.INCLUDE_PATH_PAINEL);
		die();
	}
?>
<div class="conteudo-painel">
	<h2>Editar classificado <?php echo ucfirst($classificados['nome'])?></h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$horarioAbrir = $_POST['abrir'];
				$horarioFechar = $_POST['fechar'];
				$dias = $_POST['dias'];
				$telefone = $_POST['telefone'];
				$link = $_POST['link'];
				$imagem_atual = $_POST['imagem_atual'];
				$imagem = $_FILES['imagem'];

				if($nome == '' || $horarioAbrir == '' || $horarioFechar == '' || $dias == ''|| $telefone == '' || $link == ''){
					Painel::alert('erro','Campos vazios não são permitidos');
				}else if($imagem['name'] != ''){
					//existe imagem
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ? AND id != ?");
						$verificar->execute(array($nome,$id));
						if($verificar->rowCount() == 0){
							$sql = MySql::conectar()->prepare("UPDATE `$tabela` SET img = ?,nome = ?,horario_abrir = ?,horario_fechar = ?,dias = ?, telefone = ?,link = ? WHERE id = ?");
							if($sql->execute(array($imagem,$nome,$horarioAbrir,$horarioFechar,$dias,$telefone,$link,$id))){
								Painel::alert('sucesso','Classificado atualizado com sucesso');
								$noticia = Painel::selecionar($tabela,'id',$id);
							}else{
								Painel::alert('erro','Ocorreu um erro ao atualizar');
							}
						}else{
							Painel::alert('erro','Já existe uma classificado com esse nome');
						}
					}else{
						Painel::alert('erro','Imagem inválida');
					}
				}else{
					$imagem = $imagem_atual;
					$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ? AND id != ?");
					$verificar->execute(array($nome,$id));
					if($verificar->rowCount() == 0){
						$sql = MySql::conectar()->prepare("UPDATE `$tabela` SET img = ?,nome = ?,horario_abrir = ?,horario_fechar = ?,dias = ?, telefone = ?,link = ? WHERE id = ?");
						if($sql->execute(array($imagem,$nome,$horarioAbrir,$horarioFechar,$dias,$telefone,$link,$id))){
							Painel::alert('sucesso','Classificado atualizado com sucesso');
							$noticia = Painel::selecionar($tabela,'id',$id);
						}else{
							Painel::alert('erro','Ocorreu um erro ao atualizar');
						}
					}else{
						Painel::alert('erro','Já existe uma classificado com esse nome');
					}
				}
			}
		?>
		<label>Nome:</label>
		<input type="text" name="nome" value="<?php echo $classificados['nome'] ?>">
		<label>Horario de abrir:</label>
		<input class="horario" type="text" name="abrir" value="<?php echo $classificados['horario_abrir'] ?>">
		<label>Horario de fechar:</label>
		<input class="horario" type="text" name="fechar" value="<?php echo $classificados['horario_fechar'] ?>">
		<label>Dias de funcionamento</label>
		<input type="text" name="dias" value="<?php echo $classificados['dias'] ?>">
		<label>Telefone</label>
		<input class="telefone" type="text" name="telefone" value="<?php echo $classificados['telefone'] ?>">
		<label>Link</label>
		<input type="text" name="link" value="<?php echo $classificados['link'] ?>">
		
		<label>Imagem:</label>
		<input type="file" name="imagem">
		<input type="hidden" name="imagem_atual" value="<?php echo $classificados['img']?>">

		<input type="submit" name="acao" value="Atualizar">
	</form>
</div><!--conteudo-painel-->