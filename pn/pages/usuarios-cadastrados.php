<?php  
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.usuarios';
	if(isset($_GET['deletar'])){
		$idExcluir = intval($_GET['deletar']);
		$deletarImg = MySql::conectar()->prepare("SELECT img FROM `$tabela` WHERE id = ?");
		$deletarImg->execute(array($idExcluir));
		$deletarImg = $deletarImg->fetch();
		Painel::deleteFile($deletarImg['img']);
		Painel::deletar($tabela,$idExcluir);
		header('location:'.INCLUDE_PATH_PAINEL.'usuarios-cadastrados');
		die();
	}

?>
<div class="conteudo-painel">
	<h2>Usuarios cadastrados</h2>

	<div class="table-overflow"> 
		<table> 
			<tr> 
				<th>Usuario</th> 
				<th>Cargo</th>
				<th>#</th> 
				<th>#</th> 
			</tr> 
			<?php 
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY cargo "); 
				$sql->execute(); $usuarios = $sql->fetchAll();
		
				foreach ($usuarios as $key => $value) {
					if($value['cargo'] == 0){
						continue;
					}
			?>
			<tr>
				<td><?php echo $value['usuario']?></td>
				<td><?php echo Painel::pegaCargo($value['cargo'])?></td>
				<td><a class="btn editar" href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario?id=<?php echo $value['id']?>">Editar</a></td>
				<td><a class="btn excluir" href="<?php echo INCLUDE_PATH_PAINEL?>usuarios-cadastrados?deletar=<?php echo $value['id']?>">Excluir</a></td>
			</tr>
			<?php }?>
		</table>
	</div><!--table-overflow-->
</div>