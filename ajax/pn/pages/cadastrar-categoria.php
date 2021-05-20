<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.categoria';
?>
<div class="conteudo-painel">
	<h2>Cadastrar categoria</h2>

	<form method="post">
		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				if($nome == ''){
					Painel::alert('erro','Adicione o nome da categoria');
				}else{
					$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ?");
					$verificar->execute(array($nome));
					$verificar = $verificar->rowCount();
					if($verificar == 0){
						$slug = Painel::gerarSlug($nome);
						$sql = MySql::conectar()->prepare("INSERT INTO `$tabela` VALUES(null,?,?)");
						$sql->execute(array($nome,$slug));
						Painel::alert('sucesso','Categoria cadastrada com sucesso');
					}else{
						Painel::alert('erro','Essa categoria já existe');
					}
				}
			}
			
		?>

		<label>Nome da categoria</label>
		<input type="text" name="nome">
		<input type="submit" name="acao">
	</form>
</div><!--conteudo-painel-->