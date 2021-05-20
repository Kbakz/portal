<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.apoiadores';
?>

<div class="conteudo-painel">
	<h2>Cadastrar classificado</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$link = $_POST['link'];
				$imagem = $_FILES['imagem'];

				if($nome == '' || $link == '' || $imagem['name'] == ''){
					Painel::alert('erro','Campos vazios não são permitidos');
				}else{
					if(Painel::imagemValida($imagem)){
						$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ?");
						$verificar->execute(array($nome));
						$verificar = $verificar->rowCount();
						if($verificar == 0){
							$imagem = Painel::uploadFile($imagem);
							$sql = MySql::conectar()->prepare("INSERT INTO `$tabela` VALUES(null,?,?,?)");
							$sql->execute(array($imagem,$nome,$link));
							Painel::alert('sucesso','Apoiador cadastrado com sucesso');
						}else{
							Painel::alert('erro','Já existe um apoiador com esse nome');
						}
					}else{
						Painel::alert('erro','Selecione uma imagem válida');
					}
				}
			}
		?>
		<label>Nome:</label>
		<input type="text" name="nome">
		<label>Link</label>
		<input type="text" name="link">
		<label>Imagem:</label>
		<input type="file" name="imagem">

		<input type="submit" name="acao">
	</form>
</div><!--conteudo-painel-->