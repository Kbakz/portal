<?php
 	include('config.php');
 	Site::atualizarUsuario();
 	Site::contarVisitas();

 	$url = isset($_GET['url']) ? $_GET['url'] : 'noticias';
 	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
    $sql->execute();
    $sobre = $sql->fetch();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Kevin Freire, Estalone Lima">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta property="og:title" content="">
	<meta property="og:site_name" content="">
	<meta property="og:description" content="">
	<meta property="og:url" content="<?php echo INCLUDE_PATH?>">
	<meta property="og:image" content="">
	<meta property="og:image:type" content="">

	<link rel="preload" as="style" href="<?php echo INCLUDE_PATH?>css/style.css">
	<link rel="preload" as="image" href="">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH?>css/style.css">

	<title>
	<?php
		if($url == 'noticias')
			echo ucfirst('Portal de noticias');
		else if($url == 'quem-somos')
			echo ucfirst('quem somos');
		else if($url == 'classificados')
			echo ucfirst($url);
		else if($url == 'apoiadores')
			echo ucfirst($url);
		else{
			$noticiaUrl = explode('/', $url);
			if(isset($noticiaUrl[1]))
				echo ucfirst($noticiaUrl[1]);
			else
				echo ucfirst('Portal de noticias');
		}
	?>
	 </title>
</head>
<body>
	<base base="<?php echo INCLUDE_PATH?>">
	<header>
		<div class="center">
			<div class="logo">
				<h2>Logomarca</h2>
			</div><!--logo-->
			
				<div class="social">
					<a href="http://<?php echo $sobre['social_1']?>"><i class="<?php echo $sobre['icone1']?>"></i></a>
					<a href="http://<?php echo $sobre['social_2']?>"><i class="<?php echo $sobre['icone2']?>"></i></a>
					<a href="http://<?php echo $sobre['social_3']?>"><i class="<?php echo $sobre['icone3']?>"></i></a>
				</div><!--social-->

				<nav class="desktop">
					<ul>
						<li <?php Site::selectedMenu('noticias');@Site::selectedMenu('');?>><a href="<?php echo INCLUDE_PATH?>">Notícias</a></li>
						<li <?php Site::selectedMenu('quem-somos');?>><a href="<?php echo INCLUDE_PATH?>quem-somos">Quem somos</a></li>
						<li <?php Site::selectedMenu('classificados');?>><a href="<?php echo INCLUDE_PATH?>classificados">Classificados</a></li>
						<li <?php Site::selectedMenu('apoiadores');?>><a href="<?php echo INCLUDE_PATH?>apoiadores">Apoiadores</a></li>
					</ul>
				</nav><!--desktop-->

				<nav class="mobile">
					<span><i class="fas fa-stream"></i></span>
					<ul>
						<li><a href="<?php echo INCLUDE_PATH?>noticias">Notícias</a></li>
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
				include('pages/noticias.php');
			}
		?>
	</section><!--conteudo-->

	<footer>
		<p>&copy2021 - Todos os direitos reservados</p>
	</footer>

	<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH?>js/constants.js"></script>
	<script src="https://kit.fontawesome.com/169263c84a.js" crossorigin="anonymous" defer></script>
	<script src="<?php echo INCLUDE_PATH?>js/main.js"></script>
</body>
</html>