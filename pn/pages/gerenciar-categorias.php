<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.categoria';
	if(isset($_GET['deletar'])){
		$idExcluir = intval($_GET['deletar']);
		Painel::deletar($tabela,$idExcluir);
		$noticias = MySql::conectar()->prepare("SELECT * FROM `tb_admin.noticias` WHERE categoria_id = ?");
		$noticias->execute(array($idExcluir));
		$noticias = $noticias->fetchAll();

		foreach ($noticias as $key => $value) {
			$imgDelete = $value['imagem'];
			Painel::deleteFile($imgDelete);
		}
		$noticias = MySql::conectar()->prepare("DELETE FROM `tb_admin.noticias` WHERE categoria_id = ?");
		$noticias->execute(array($idExcluir));
		header('location:'.INCLUDE_PATH_PAINEL.'gerenciar-categorias');
		die();
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 15;
	$query = ($paginaAtual - 1) * $porPagina;
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
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY nome LIMIT $query,$porPagina"); 
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

	<div class="paginacao">
		<?php
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
			$sql->execute();
			$sql = $sql->fetchAll();
			$totalPaginas = ceil(count($sql) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($paginaAtual > $totalPaginas)
					$paginaAtual = 1;

				if($totalPaginas != 1){
					if( $i == $paginaAtual)
						echo '<a class="selecionado" href="'.INCLUDE_PATH_PAINEL.'/gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';
					else
						echo '<a href="'.INCLUDE_PATH_PAINEL.'/gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';
				}
			}
		?>
	</div><!--paginacao-->
</div><!--conteudo-painel-->