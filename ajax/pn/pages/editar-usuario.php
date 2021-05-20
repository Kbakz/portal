<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.usuarios';
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$usuario = Painel::selecionar($tabela,'id',$id);
		if($usuario['cargo'] == 0){
			Permissao::verificaPermissaoPagina(0);
		}
	}else{
		header('location: '.INCLUDE_PATH_PAINEL);
		die();
	}
?>
<div class="conteudo-painel">
	<h2>Editar usuario <?php echo ucfirst($usuario['usuario'])?></h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$senha = $_POST['senha'];
				$cargo = $_POST['cargo'];
				$imagem_atual = $_POST['imagem_atual'];
				$imagem = $_FILES['imagem'];

				if($nome == '' || $senha == '' || $cargo == ''){
					Painel::alert('erro','Campos vazios não são permitidos');
				}else if($imagem['name'] != ''){
					//existe imagem
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						if(Usuario::atualizarUsuario($senha,$imagem,$nome,$cargo,$id)){
							Painel::alert('sucesso','Usuario atualizado com sucesso');
							$usuario = Painel::selecionar($tabela,'id',$id);
						}else{
							Painel::alert('erro','Ocorreu um erro ao atualizar');
						}
					}else{
						Painel::alert('erro','Imagem inválida');
					}
				}else{
					$imagem = $imagem_atual;
					if(Usuario::atualizarUsuario($senha,$imagem,$nome,$cargo,$id)){
						Painel::alert('sucesso','Usuario atualizado com sucesso');
						$usuario = Painel::selecionar($tabela,'id',$id);
					}else{
						Painel::alert('erro','Ocorreu um erro ao atualizar');
					}
				}
			}
		?>

		<label>Nome:</label>
		<input type="text" name="nome" value="<?php echo $usuario['nome'] ?>">
		<label>Senha:</label>
		<input type="password" name="senha" value="<?php echo $usuario['senha'] ?>">
		<label>Cargo:</label>
		<select name="cargo">
			<?php
				foreach (Painel::$cargos as $key => $value) {
					if($key == $usuario['cargo']) echo '<option selected value="'.$key.'">'.$value.'</option>';
					if($key > $_SESSION['cargo'] && $key != $usuario['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
				}
			?>
		</select>
		<label>Imagem:</label>
		<input type="file" name="imagem">
		<input type="hidden" name="imagem_atual" value="<?php echo $usuario['img']?>">

		<input type="submit" name="acao" value="Atualizar">
	</form>
</div><!--conteudo-painel-->