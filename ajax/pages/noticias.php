<?php
	$url = explode('/',@$_GET['url']);

	if (!isset($url[1])) {
		$categoria = MySql::conectar()->prepare("SELECT * FROM `tb_admin.categoria` WHERE slug = ?");
		$categoria->execute(array(@$url[0]));
		$categoria = $categoria->fetch();
?>
<aside>
	<p><i class="fas fa-angle-double-right"></i></p>
	<div class="categorias">
		<h2><i class="fas fa-filter"></i> Categorias</h2>
		<form>
			<select id="cat" name="categoria">

				<option selected value="">Todas as categorias</option>
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
		<form id="form-ordem" method="post">
			<select id="ordem" name="ordem">
				<?php
				$order = 'data DESC';
				if(isset($_POST['ordem'])){
					$order = $_POST['ordem'];
				}
			?>
				<option selected disabled>ordenar notícias</option>
				<option <?php if($order == 'data DESC') echo "selected";?> value="data DESC">Data (Mais recente)</option>
				<option <?php if($order == 'data') echo "selected";?> value="data">Data (Mais antigo)</option>
				<option <?php if($order == 'titulo') echo "selected";?> value="titulo">titulo (A - Z)</option>
				<option <?php if($order == 'titulo DESC') echo "selected";?> value="titulo DESC">titulo (Z - A)</option>
			</select>
		</form>
		<?php
			if(isset($_POST['ordem'])){
				echo '<script> alert('.$_POST['ordem'].')</script>';
			}
		?>
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
		<div class="jd-slider publi-single">
			<div class="slide-inner">
			    <ul class="slide-area">
			      <li>Slide 1</li>
			      <li>Slide 2</li>
			      <li>Slide 3</li>
			      <li>Slide 4</li>
			      <li>Slide 5</li>
			      <li>Slide 6</li>
			    </ul>
			</div>
			  <a class="prev" href="#"><i class="fas fa-angle-left fa-2x"></i></a>
			  <a class="next" href="#"><i class="fas fa-angle-right fa-2x"></i></a>
			<div class="controller">
			  <div class="indicate-area"></div>
			</div>
		</div><!--publi-single-->
	</div><!--publicidades-->

	
		<?php
		if(!isset($_POST['busca']) && !$categoria){
			$destaque = MySql::conectar()->prepare("SELECT * FROM `tb_admin.noticias` WHERE destaque = 'true'");
            $destaque->execute();
            $destaque = $destaque->fetch();
            if(!$destaque){
            	$destaque = MySql::conectar()->prepare("SELECT * FROM `tb_admin.noticias` ORDER BY id DESC LIMIT 1");
            	$destaque->execute();
            	$destaque = $destaque->fetch();
            }
            $sql = MySql::conectar()->prepare("SELECT slug FROM `tb_admin.categoria` WHERE id = ?");
	    	$sql->execute(array($destaque['categoria_id']));
			$categoriaNome = $sql->fetch()['slug'];
		?>
		<div class="noticia-destaque">
			<div class="capa-destaque">
				<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $destaque['imagem']?>">
			</div><!--capa-destaque-->
			<div class="conteudo-destaque">
				<h1><?php echo $destaque['titulo']?></h1>
				<p><?php echo substr(strip_tags($destaque['lide']),0,700); if(strlen($destaque['lide']) > 700) echo '...';?></p>
				<a href="<?php echo INCLUDE_PATH;?><?php echo $categoriaNome; ?>/<?php echo $destaque['slug']; ?>">Ver mais</a>
			</div><!--conteudo-destaque-->
		</div><!--noticia-destaque-->
		<?php } ?>


	<div class="noticias">
		<div class="header-noticias">
			<?php
			$porPagina = 15;
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
				if(isset($_POST['busca'])){
					$noticiasCount = count($noticias);
					if($noticiasCount == 0)
						echo '<h2><i class="fas fa-exclamation-triangle"></i> Nenhum resultado encontrado</h2>';
					else if($noticiasCount == 1)
						echo '<h2><i class="fas fa-check-circle"></i> Busca por <span>'.$_POST['busca'] .'</span> ('.$noticiasCount.' resultado encontrado)</h2>';
					else
						echo '<h2><i class="fas fa-check-circle"></i> Busca por <span>'.$_POST['busca'] .'</span> ('.$noticiasCount.' resultados encontrados)</h2>';
				}

			?>
		</div><!--header-noticias-->
		<div class="noticias-container">
			<?php
	            
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
					<p><?php echo substr(strip_tags($value['lide']),0,200); if(strlen($value['lide']) > 200) echo '...'; ?></p>
					<a href="<?php echo INCLUDE_PATH;?><?php echo $categoriaNome; ?>/<?php echo $value['slug']; ?>">Ver mais</a>
				</div><!--conteudo-noticia-->
			</div><!--noticia-single-->
			<?php
				}
			?>
		</div><!--noticia-container-->	

		<div class="paginacao">
			<?php
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.noticias`");
				$sql->execute();
				$sql = $sql->fetchAll();
				$totalPaginas = ceil(count($sql) / $porPagina);

				for($i = 1; $i <= $totalPaginas; $i++){
					if($totalPaginas != 1){
						if( $i == $pagina)
							echo '<a class="selecionado" href="'.INCLUDE_PATH.'?pagina='.$i.'">'.$i.'</a>';
						else
							echo '<a href="'.INCLUDE_PATH.'?pagina='.$i.'">'.$i.'</a>';
					}
				}
			?>
		</div><!--paginacao-->
	</div><!--noticias-->
</div><!--box-content-->
<?php }else{ 
		include('noticia_single.php');
	} 
?>