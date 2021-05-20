<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.categoria';
	$id = (int)$_GET['id'];
	$categoria = Painel::selecionar($tabela,'id',$id);
?>
<div class="conteudo-painel">
	<h2>Editar categoria <?php echo $categoria['nome'];?></h2>

	<form method="post">
		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				if($nome == ''){
					Painel::alert('erro','Adicione o nome da categoria');
				}else{
					$verificar = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nome = ? AND id != ?");
					$verificar->execute(array($nome,$id));
					$verificar = $verificar->rowCount();
					if($verificar == 0){
						$slug = Painel::gerarSlug($nome);
						$sql = MySql::conectar()->prepare("UPDATE `$tabela` SET nome = ?, slug = ? WHERE id = ?");
						$sql->execute(array($nome,$slug,$id));
						Painel::alert('sucesso','Categoria cadastrada com sucesso');
						$categoria = Painel::selecionar($tabela,'id',$id);
					}else{
						Painel::alert('erro','Essa categoria já existe');
					}
				}
			}
		?>
		<label>Nome da categoria:</label>
		<input type="text" name="nome" value="<?php echo $categoria['nome'];?>">
		<input type="submit" name="acao" value="Atualizar">
	</form>
</div><!--conteudo-painel-->