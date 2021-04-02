<?php
	$url = explode('/',@$_GET['url']);

	if (!isset($url[2])) {
		$categoria = MySql::conectar()->prepare("SELECT * FROM `tb_admin.categoria` WHERE slug = ?");
		$categoria->execute(array(@$url[1]));
		$categoria = $categoria->fetch();
?>
<aside>
	<p><i class="fas fa-angle-double-right"></i></p>
	<div class="categorias">
		<h2><i class="fas fa-filter"></i> Categorias</h2>
		<form>
			<select name="categoria">

				<option selected>Todas as categorias</option>
				<?php
					$categorias = MySql::conectar()->prepare("SELECT * FROM `tb_admin.categoria` ORDER BY nome ASC");
					$categorias->execute();
					$categorias = $categorias->fetchAll();

					foreach ($categorias as $key => $value) {
				?>
				<option <?php if($value['slug'] == @$url[0]) echo 'selected'; ?> value="<?php echo $value['slug'];?>"><?php echo $value['nome'];?></option>
				<?php }?>
			</select>
		</form>
	</div><!--categoria-->

	<div class="categorias">
		<h2><i class="fas fa-sort-amount-down"></i> Ordem</h2>
		<form>
			<select name="ordem">

				<option selected disabled>ordenar notícias</option>
				<option>Data (mais recente)</option>
				<option>Data (mais antigo)</option>
				<option>Título (A - Z)</option>
				<option>Título (Z - A)</option>		
			</select>
		</form>
	</div><!--categoria-->
	<div class="contato-aside">
		<p>Entre em contato conosco <a href="<?php echo INCLUDE_PATH?>quem-somos#contato">aqui</a></p>
	</div>
</aside>
	<?php
		$busca = '';
		if (isset($_POST['acao'])) {
			$busca = $_POST['busca'];
		}
	?>
<div class="center">
	<form class="form-noticia" method="post">
		<input type="text" name="busca" placeholder="Buscar...">
		<button type="submit" name="acao"><i class="fas fa-search"></i></button>
	</form>
</div>

<div class="box-content">
	<div class="publi">
		<div class="publi-single">

		</div><!--publi-single-->
	</div><!--publicidades-->

	<div class="noticia-destaque">
		<?php
			$destaque = MySql::conectar()->prepare("SELECT * FROM `tb_admin.noticias` WHERE destaque = 'true'");
            $destaque->execute();
            $destaque = $destaque->fetch();
		?>
		<div class="capa-destaque">
			<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $destaque['imagem']?>">
		</div><!--capa-destaque-->
		<div class="conteudo-destaque">
			<h1><?php echo $destaque['titulo']?></h1>
			<p><?php echo substr($destaque['conteudo'],0,700)?>... </p>
			<a href="">Ver mais</a>
		</div><!--conteudo-destaque-->
	</div><!--noticia-destaque-->

	<div class="noticias">
		<div class="header-noticias">
			<?php
			$porPagina = 2;
			$order = 'data';
				if (!isset($_POST['busca'])) {
					if(@$categoria['nome'] == ''){
						echo "<h2>Visualizando todas as notícias</h2>";
					}else{
						echo "<h2>Visualizando todas notícias em <span>".$categoria['nome']."</span></h2>";
					}				
				}

				$query = "SELECT * FROM `tb_admin.noticias` ";
				if(@$categoria['nome'] !=  ''){
					$categoria['id'] = (int)$categoria['id'];
					$query.= "WHERE categoria_id = $categoria[id] ";
				}
				if (isset($_POST['busca'])) {
					if(strstr($query, 'WHERE') !== false){
						$busca = $_POST['busca'];
						$query.=" AND titulo LIKE '%$busca%' ";
					}else{
						$busca = $_POST['busca'];
						$query.=" WHERE titulo LIKE '%$busca%' ";
					}
				}
				$query2 = "SELECT * FROM `tb_admin.noticias` ";
				if(@$categoria['nome'] !=  ''){
					$categoria['id'] = (int)$categoria['id'];
					$query2.= "WHERE categoria_id = $categoria[id]";
				}
				if (isset($_POST['busca'])) {
					if(strstr($query2, 'WHERE') !== false){
						$busca = $_POST['busca'];
						$query2.=" AND titulo LIKE '%$busca%' ";
					}else{
						$busca = $_POST['busca'];
						$query2.=" WHERE titulo LIKE '%$busca%' ";
					}
				}
				$totalPaginas = MySql::conectar()->prepare($query2);
				$totalPaginas->execute();
				$totalPaginas = ceil($totalPaginas->rowCount() / $porPagina);

				if(!isset($_POST['busca'])){
					if(isset($_GET['pagina'])){
						$pagina = (int)$_GET['pagina'];
						if($pagina > $totalPaginas)
							$pagina = 1;
						
						$queryPg = ($pagina - 1) * $porPagina;
						$query.= "ORDER BY $order LIMIT $queryPg, $porPagina";
					}else{
						$pagina = 1;
						$query.= "ORDER BY $order LIMIT 0, $porPagina";
					}
				}else{
					$query.= "ORDER BY $order";

				}
				$sql = MySql::conectar()->prepare($query);
				$sql->execute();
				$noticias = $sql->fetchAll();
			?>
		</div><!--header-noticias-->
		<div class="noticias-container">
			<?php
				//$noticias = MySql::conectar()->prepare("SELECT * FROM `tb_admin.noticias` WHERE titulo LIKE '%$busca%'");
	            //$noticias->execute();
	            //$noticias = $noticias->fetchAll();
	            
	    		foreach ($noticias as $key => $value) {
	    		$sql = MySql::conectar()->prepare("SELECT slug FROM `tb_admin.categoria` WHERE id = ?");
	    		$sql->execute(array($value['categoria_id']));
				$categoriaNome = $sql->fetch()['slug'];
			?>
			<div class="noticia-single">
				<div class="capa-noticia">
					<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['imagem']?>">
				</div><!--capa-noticia-->
				<div class="conteudo-noticia">
					<h3><?php echo $value['titulo']?></h3>
					<p><?php echo substr(strip_tags($value['conteudo']),0,200)?>...</p>
					<a href="<?php INCLUDE_PATH;?><?php echo $categoriaNome; ?>/<?php echo $value['slug']; ?>">Ver mais</a>
				</div><!--conteudo-noticia-->
			</div><!--noticia-single-->
			<?php
				}
			?>
		</div><!--noticia-container-->	
	</div><!--noticias-->
</div><!--box-content-->
<?php }else{ 
		include('noticia_single.php');
	} 
?>