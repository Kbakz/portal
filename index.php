<?php
 	include('config.php');
 	Site::atualizarUsuario();
 	Site::contarVisitas();

 	$url = isset($_GET['url']) ? $_GET['url'] : 'noticias';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Kevin Freire, Estalone Lima">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>Portal de notícias</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH?>css/style.css">
</head>
<body>
	<header>
		<div class="center">
			<div class="logo">
				<h2>Logomarca</h2>
			</div><!--logo-->
			
				<form method="post">
					<input type="text" name="busca" placeholder="Buscar...">
					<button type="submit" name="acao"><i class="fas fa-search"></i></button>
				</form>

				<div class="social">
					<a href=""><i class="fab fa-facebook-f"></i></a>
					<a href=""><i class="fab fa-twitter"></i></a>
					<a href=""><i class="fab fa-instagram"></i></a>
				</div><!--social-->

				<nav class="desktop">
					<ul>
						<li <?php Site::selectedMenu('noticias');@Site::selectedMenu('');?>><a href="<?php echo INCLUDE_PATH?>">Notícias</a></li>
						<li <?php Site::selectedMenu('quem-somos');?>><a href="<?php echo INCLUDE_PATH?>quem-somos">Quem somos</a></li>
						<li <?php Site::selectedMenu('classificados');?>><a href="<?php echo INCLUDE_PATH?>classificados">Classificados</a></li>
						<li <?php Site::selectedMenu('publicidade');?>><a href="<?php echo INCLUDE_PATH?>publicidade">Apoiadores</a></li>
					</ul>
				</nav><!--desktop-->

				<nav class="mobile">
					<span><i class="fas fa-stream"></i></span>
					<ul>
						<li><a href="<?php echo INCLUDE_PATH?>">Notícias</a></li>
						<li><a href="<?php echo INCLUDE_PATH?>quem-somos">Quem somos</a></li>
						<li><a href="<?php echo INCLUDE_PATH?>classificados">Classificados</a></li>
						<li><a href="<?php echo INCLUDE_PATH?>publicidade">Apoiadores</a></li>
					</ul>
				</nav><!--mobile-->
				
			
			<div class="clear"></div>
		</div><!--center-->
	</header>

	<section class="conteudo">
		<?php 
			if(file_exists('pages/'.$url.'.php')){
				include('pages/'.$url.'.php');
			}else{
				include('pages/error.php');
			}
		?>
	</section><!--conteudo-->

	<footer>
		Todos os direitos reservados
	</footer>

	<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
	<script src="https://kit.fontawesome.com/169263c84a.js" crossorigin="anonymous" defer></script>
	<script src="<?php echo INCLUDE_PATH?>js/main.js"></script>
</body>
</html>