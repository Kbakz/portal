<aside>
	<p><i class="fas fa-angle-double-right"></i></p>
	<div class="categorias">
		<h2><i class="fas fa-filter"></i></h2>
		<form>
			<select name="categoria">

				<option selected>Todas as categorias</option>
				<option value="esporte">Esporte</option>
				<option>Saúde</option>
		
			</select>
		</form>
	</div><!--categoria-->
	<div class="contato-aside">
		<p>Entre em contato conosco <a href="<?php echo INCLUDE_PATH?>quem-somos#contato">aqui</a></p>
	</div>
</aside>

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
		<?php
			$noticias = MySql::conectar()->prepare("SELECT * FROM `tb_admin.noticias`");
            $noticias->execute();
            $noticias = $noticias->fetchAll();
    		foreach ($noticias as $key => $value) {
		?>
		<div class="noticia-single">
			<div class="capa-noticia">
				<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['imagem']?>">
			</div><!--capa-noticia-->
			<div class="conteudo-noticia">
				<h3><?php echo $value['titulo']?></h3>
				<p><?php echo substr($value['conteudo'],0,300)?>...</p>
				<a href="">Ver mais</a>
			</div><!--conteudo-noticia-->
		</div><!--noticia-single-->
		<?php
			}
		?>
		
		</div><!--noticia-single-->
	</div><!--noticias-->
</div><!--box-content-->