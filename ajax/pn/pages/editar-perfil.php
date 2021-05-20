<?php
	$tabela = 'tb_admin.usuarios';
	$id = MySql::conectar()->prepare("SELECT id FROM `$tabela` WHERE usuario = ?");
	$id->execute(array($_SESSION['usuario']));
	$id = $id->fetch();
?>

<div class="conteudo-painel">
	<h2>Editar perfil - <?php echo ucfirst($_SESSION['usuario']);?></h2>

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
						if(Usuario::atualizarUsuario($senha,$imagem,$nome,$cargo,$id['id'])){
							$_SESSION['nome'] = $nome;
							$_SESSION['senha'] = $senha;
							$_SESSION['img'] = $imagem;
							Painel::alert('sucesso','Usuario atualizado com sucesso');
						}else{
							Painel::alert('erro','Ocorreu um erro ao atualizar');
						}
					}else{
						Painel::alert('erro','Imagem inválida');
					}
				}else{
					$imagem = $imagem_atual;
					if(Usuario::atualizarUsuario($senha,$imagem,$nome,$cargo,$id['id'])){
						$_SESSION['nome'] = $nome;
						$_SESSION['senha'] = $senha;
						Painel::alert('sucesso','Usuario atualizado com sucesso');
					}else{
						Painel::alert('erro','Ocorreu um erro ao atualizar');
					}
				}
			}
		?>

		<label>Nome:</label>
		<input type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>">
		<label>Senha:</label>
		<input type="password" name="senha" value="<?php echo $_SESSION['senha'] ?>">
		<label>Cargo:</label>
		<select name="cargo">
			<?php
				foreach (Painel::$cargos as $key => $value) {
					if($key == $_SESSION['cargo']) echo '<option desable value="'.$key.'">'.$value.'</option>';
				}
			?>
		</select>
		<label>Imagem:</label>
		<input type="file" name="imagem">
		<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']?>">

		<input type="submit" name="acao" value="Atualizar">
	</form>
</div><!--conteudo-painel-->