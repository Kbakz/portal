<aside>
	<p><i class="fas fa-angle-double-right"></i></p>
	<!--<h2>Categoria</h2>-->
	<div class="categorias">
		<h2><i class="fas fa-filter"></i></h2>
		<form>
			<select name="categoria">

				<option selected>Todas as categorias</option>
				<option>Esporte</option>
				<option>Saúde</option>
		
			</select>
		</form>
	</div><!--categoria-->
</aside>

<div class="box-content">
	<div class="publi">
		<div class="publi-single">

		</div><!--publi-single-->
	</div><!--publicidades-->

	<div class="noticia-destaque">
		<div class="capa-destaque">

		</div><!--capa-destaque-->
		<div class="conteudo-destaque">
			<h1>Notícia destaque</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<a href="">Ver mais</a>
		</div><!--conteudo-destaque-->
	</div><!--noticia-destaque-->

	<div class="noticias">
		<?php
			for ($i=0; $i < 12; $i++) { 
		?>
		<div class="noticia-single">
			<div class="capa-noticia">

			</div><!--capa-noticia-->
			<div class="conteudo-noticia">
				<h3>Notícia single</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt eiusmod
				tempor incididun...</p>
				<a href="">Ver mais</a>
			</div><!--conteudo-noticia-->
		</div><!--noticia-single-->
		<?php
			}
		?>
		
		</div><!--noticia-single-->
	</div><!--noticias-->
</div><!--box-content-->