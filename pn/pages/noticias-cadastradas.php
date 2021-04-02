<?php
	$tabela = 'tb_admin.noticias';
	if(isset($_GET['deletar'])){
		$idExcluir = intval($_GET['deletar']);
		$selecionarImg = MySql::conectar()->prepare("SELECT imagem FROM `$tabela` WHERE id = ?");
		$selecionarImg->execute(array($idExcluir));
		$selecionarImg = $selecionarImg->fetch();
		Painel::deleteFile($selecionarImg['imagem']);
		Painel::deletar($tabela,$idExcluir);
		header('location:'.INCLUDE_PATH_PAINEL.'noticias-cadastradas');
		die();
	}

	

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 15;
	$query = ($paginaAtual - 1) * $porPagina;
?>
<div class="conteudo-painel">
	<h2>Notícias cadastradas</h2>
	<?php
	$ordem = 'data';
	$busca = '';
		if(isset($_POST['acao'])){
			$ordem = $_POST['ordenar'];
			$busca = $_POST['busca'];
		}
	?>
	<form class="filtro-painel" method="post">
		<label>Pesquisar noticia:</label>
		<input type="search" name="busca">
		<label>Ordenar por:</label>
		<select name="ordenar">
			<option <?php if($ordem == 'data') echo "selected";?> value="data">Data (Mais recente)</option>
			<option <?php if($ordem == 'data DESC') echo "selected";?> value="data DESC">Data (Mais antigo)</option>
			<option <?php if($ordem == 'titulo') echo "selected";?> value="titulo">titulo (A - Z)</option>
			<option <?php if($ordem == 'titulo DESC') echo "selected";?> value="titulo DESC">titulo (Z - A)</option>
			<option <?php if($ordem == 'categoria_id') echo "selected";?> value="categoria_id">Categorias</option>
			<option <?php if($ordem == 'autor') echo "selected";?> value="autor">Autor</option>
		</select>
		<input type="submit" name="acao" value="filtrar">
	</form>
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
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE titulo LIKE '%$busca%' ORDER BY $ordem LIMIT $query,$porPagina"); 
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
	<div class="paginacao">
		<?php
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
			$sql->execute();
			$sql = $sql->fetchAll();
			$totalPaginas = ceil(count($sql) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($totalPaginas != 1){
					if( $i == $paginaAtual)
						echo '<a class="selecionado" href="'.INCLUDE_PATH_PAINEL.'/noticias-cadastradas?pagina='.$i.'">'.$i.'</a>';
					else
						echo '<a href="'.INCLUDE_PATH_PAINEL.'/noticias-cadastradas?pagina='.$i.'">'.$i.'</a>';
				}
			}
		?>
	</div><!--paginacao-->
</div><!--conteudo-painel-->