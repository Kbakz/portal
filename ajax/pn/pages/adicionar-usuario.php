<?php Permissao::verificaPermissaoPagina(1);?>
<div class="conteudo-painel">
	<h2>Adicionar usuario</h2>
	
	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$usuario = $_POST['usuario'];
				$senha = $_POST['senha'];
				$nome = $_POST['nome'];
				$cargo = $_POST['cargo'];
				$imagem = $_FILES['imagem'];

				if($usuario == ''){
					Painel::alert('erro','Adicione um USUÁRIO');
				}else if($senha == ''){
					Painel::alert('erro','Adicione uma SENHA');
				}else if($nome == ''){
					Painel::alert('erro','Adicione um NOME');
				}else if($cargo == ''){
					Painel::alert('erro','Selecione o CARGO');
				}else if($imagem['name'] == ''){
					Painel::alert('erro','Adicione uma IMAGEM');
				}else{
					if($cargo <= $_SESSION['cargo']){
						Painel::alert('erro','Você precisa selecionar um cargo menor que o seu');
					}else if(Painel::imagemValida($imagem) == false){
						Painel::alert('erro','Adicione uma imagem válida');
					}else if(Usuario::usuarioExistente($usuario)){
						Painel::alert('erro','Já existe um usuario com esse nome');
					}else{
						$imagem = Painel::uploadFile($imagem);
						Usuario::cadastrarUsuario($usuario,$senha,$imagem,$nome,$cargo);
						Painel::alert('sucesso','Usuario '.$usuario.' cadastrado com sucesso');
					}

					
				}
			}
		?>
		
		<label>Login:</label>
		<input type="text" name="usuario">
		<label>Senha:</label>
		<input type="password" name="senha">
		<label>Nome:</label>
		<input type="text" name="nome">
		<label>Cargo:</label>
		<select name="cargo">
			<?php
				foreach (Painel::$cargos as $key => $value) {
					if($key > $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
				}
			?>
		</select>
		<label>Imagem:</label>
		<input type="file" name="imagem">

		<input type="submit" name="acao" value="Cadastrar">
	</form>
</div><!--conteudo-painel-->