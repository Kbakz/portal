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

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 15;
	$query = ($paginaAtual - 1) * $porPagina;
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
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY nome LIMIT $query,$porPagina"); 
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

	<div class="paginacao">
		<?php
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
			$sql->execute();
			$sql = $sql->fetchAll();
			$totalPaginas = ceil(count($sql) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($totalPaginas != 1){
					if( $i == $paginaAtual)
						echo '<a class="selecionado" href="'.INCLUDE_PATH_PAINEL.'/gerenciar-apoiadores?pagina='.$i.'">'.$i.'</a>';
					else
						echo '<a href="'.INCLUDE_PATH_PAINEL.'/gerenciar-apoiadores?pagina='.$i.'">'.$i.'</a>';
				}
			}
		?>
	</div><!--paginacao-->
</div><!--conteudo-painel-->