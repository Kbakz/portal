<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.categoria';
	if(isset($_GET['deletar'])){
		$idExcluir = intval($_GET['deletar']);
		Painel::deletar($tabela,$idExcluir);
		header('location:'.INCLUDE_PATH_PAINEL.'gerenciar-categorias');
		die();
	}
?>
<div class="conteudo-painel">
	<h2>Gerenciar categorias</h2>

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
				$categorias = $sql->fetchAll();
		
				foreach ($categorias as $key => $value) {

			?>
			<tr>
				<td><?php echo $value['nome']?></td>
				<td><a class="btn editar" href="<?php echo INCLUDE_PATH_PAINEL?>editar-categoria?id=<?php echo $value['id']?>">Editar</a></td>
				<td><a class="btn excluir" href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-categorias?deletar=<?php echo $value['id']?>">Excluir</a></td>
			</tr>
			<?php }?>
		</table>
	</div><!--table-overflow-->
</div><!--conteudo-painel-->