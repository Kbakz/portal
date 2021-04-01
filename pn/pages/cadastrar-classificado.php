<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.classificados';
?>

<div class="conteudo-painel">
	<h2>Cadastrar classificado</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$horarioAbrir = $_POST['abrir'];
				$horarioFechar = $_POST['fechar'];
				$dias = $_POST['dias'];
				$telefone = $_POST['telefone'];
				$link = $_POST['link'];
				$imagem = $_FILES['imagem'];

				if($nome == '' || $horarioAbrir == '' || $horarioFechar == '' || $dias == '' || $imagem['name'] == ''){
					Painel::alert('erro','Campos vazios não são permitidos');
				}else{
					if(Painel::imagemValida($imagem)){
						$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ?");
						$verificar->execute(array($nome));
						$verificar = $verificar->rowCount();
						if($verificar == 0){
							$imagem = Painel::uploadFile($imagem);
							$sql = MySql::conectar()->prepare("INSERT INTO `$tabela` VALUES(null,?,?,?,?,?,?,?)");
							$sql->execute(array($imagem,$nome,$horarioAbrir,$horarioFechar,$dias,$telefone,$link));
							Painel::alert('sucesso','Classificado cadastrado com sucesso');
						}else{
							Painel::alert('erro','Já existe um classificado com esse nome');
						}
							

					}else{
						Painel::alert('erro','Selecione uma imagem válida');
					}
				}
			}
		?>
		<label>Nome:</label>
		<input type="text" name="nome">
		<label>Horario de abrir:</label>
		<input class="horario" type="text" name="abrir">
		<label>Horario de fechar:</label>
		<input class="horario" type="text" name="fechar">
		<label>Dias de funcionamento</label>
		<input type="text" name="dias">
		<label>Telefone</label>
		<input class="telefone" type="text" name="telefone">
		<label>Link</label>
		<input type="text" name="link">
		<label>Imagem:</label>
		<input type="file" name="imagem">

		<input type="submit" name="acao">
	</form>
</div><!--conteudo-painel-->