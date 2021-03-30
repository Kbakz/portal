<?php
	$tabela = 'tb_admin.noticias';
?>
<div class="conteudo-painel">
	<h2>Notícias cadastradas</h2>

	<div class="table-overflow"> 
		<table> 
			<tr> 
				<th>Nome</th>
				<th>Capa</th>
				<th>Categoria</th>
				<th>#</th> 
				<th>#</th> 
			</tr> 
			<?php 
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY data"); 
				$sql->execute(); 
				$noticias = $sql->fetchAll();
		
				foreach ($noticias as $key => $value) {
					$nomeCategoria = Painel::selecionar('tb_admin.categoria','id',$value['categoria_id'])['nome'];
			?>
			<tr>
				<td><?php echo $value['titulo']?></td>
				<td><img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$value['imagem']?>"></td>
				<td><?php echo $nomeCategoria?></td>
				<td><a class="btn editar" href="<?php echo INCLUDE_PATH_PAINEL?>editar-noticia?id=<?php echo $value['id']?>">Editar</a></td>
				<td><a class="btn excluir" href="<?php echo INCLUDE_PATH_PAINEL?>noticias-cadastradas?deletar=<?php echo $value['id']?>">Excluir</a></td>
			</tr>
			<?php }?>
		</table>
	</div><!--table-overflow-->
</div><!--conteudo-painel-->