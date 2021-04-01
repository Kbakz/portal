<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.apoiadores';
	if(isset($_GET['deletar'])){
		$idExcluir = intval($_GET['deletar']);
		$selecionarImg = MySql::conectar()->prepare("SELECT imagem FROM `$tabela` WHERE id = ?");
		$selecionarImg->execute(array($idExcluir));
		$selecionarImg = $selecionarImg->fetch();
		Painel::deleteFile($selecionarImg['imagem']);
		Painel::deletar($tabela,$idExcluir);
		header('location:'.INCLUDE_PATH_PAINEL.'gerenciar-apoiadores');
		die();
	}
?>
<div class="conteudo-painel">
	<h2>Apoiadores cadastrados</h2>

	<div class="table-overflow"> 
		<table> 
			<tr> 
				<th>Nome</th>
				<th>#</th> 
				<th>#</th> 
			</tr> 
			<?php
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY nome"); 
				$sql->execute(); 
				$apoiadores = $sql->fetchAll();
		
				foreach ($apoiadores as $key => $value) {

			?>
			<tr>
				<td><?php echo $value['nome']?></td>
				<td><a class="btn editar" href="<?php echo INCLUDE_PATH_PAINEL?>editar-apoiador?id=<?php echo $value['id']?>">Editar</a></td>
				<td><a class="btn excluir" href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-apoiadores?deletar=<?php echo $value['id']?>">Excluir</a></td>
			</tr>
			<?php }?>
		</table>
	</div><!--table-overflow-->
</div><!--conteudo-painel-->