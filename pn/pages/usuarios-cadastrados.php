<?php  Permissao::verificaPermissaoPagina(1);?>
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
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` ORDER BY cargo ");
				$sql->execute();
				$usuarios = $sql->fetchAll();

				foreach ($usuarios as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['usuario']?></td>
				<td><?php echo Painel::pegaCargo($value['cargo'])?></td>
				<td><a class="btn editar" href="">Editar</a></td>
				<td><a class="btn excluir" href="">Excluir</a></td>
			</tr>
			<?php }?>
		</table>
	</div><!--table-overflow-->
</div>