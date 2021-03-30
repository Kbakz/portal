<?php
	if (isset($_GET['logout'])) {
		Painel::logout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
	<title>Painel de controle</title>
</head>
<body>
	<p class="btn-menu"><i class="fas fa-angle-double-left"></i></p>
	<div class="menu-painel">
		
		<div class="img-usuario">
			<?php
				if ($_SESSION['img'] == '') {			
			?>	
				<i class="fas fa-user"></i>
			<?php }else{?>
				<img src="<?php echo INCLUDE_PATH_PAINEL?>/uploads/<?php echo $_SESSION['img']?>">
			<?php }?>
		</div><!--img-usuario-->
		<h2><?php echo ucfirst($_SESSION['nome']); ?></h2>
		<span><?php echo Painel::pegaCargo($_SESSION['cargo']); ?></span>

		<div class="itens-menu">
			<h3>Métricas</h3>
			<a <?php @Site::selectedMenu('')?> href="<?php echo INCLUDE_PATH_PAINEL?>">Ver Métricas</a>
		</div><!--itens-menu-->
		<div class="itens-menu">
			<h3>Gerenciar notícias</h3>
			<a <?php Site::selectedMenu('cadastrar-categoria'); Permissao::verificaPermissaoMenu(1)?> href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-categoria">Cadastrar categoria</a>
			<a <?php Site::selectedMenu('gerenciar-categorias'); Permissao::verificaPermissaoMenu(1)?> href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-categorias">Gerenciar categorias</a>
			<a <?php Site::selectedMenu('postar-noticia'); Permissao::verificaPermissaoMenu(2)?> href="<?php echo INCLUDE_PATH_PAINEL?>postar-noticia">Postar notícia</a>
			<a <?php Site::selectedMenu('noticias-cadastradas');?> href="<?php echo INCLUDE_PATH_PAINEL?>noticias-cadastradas">Notícias cadastradas</a>
		</div><!--itens-menu-->
		<div class="itens-menu">
			<h3>Gerenciar usuarios</h3>
			<a <?php Site::selectedMenu('adicionar-usuario'); Permissao::verificaPermissaoMenu(0)?> href="<?php echo INCLUDE_PATH_PAINEL?>adicionar-usuario">Adicionar novo usuario</a>
			<a <?php Site::selectedMenu('usuarios-cadastrados'); Permissao::verificaPermissaoMenu(1)?> href="<?php echo INCLUDE_PATH_PAINEL?>usuarios-cadastrados">Usuarios cadastrados</a>
			<a <?php Site::selectedMenu('editar-perfil');?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-perfil">Editar perfil</a>
		</div><!--itens-menu-->
	</div><!--menu-painel-->
	<div class="header-painel">
		<div class="center">
			<div class="logout">
				<a href="?logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
			</div>
			<div class="clear"></div>
		</div>
	</div><!--header-painel-->
	<div class="sessao-conteudo">
		<?php Painel::carregarPagina();?>
	</div><!--conteudo-painel-->
<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
<script src="https://kit.fontawesome.com/169263c84a.js" crossorigin="anonymous" defer></script>
<script src="https://cdn.tiny.cloud/1/0rrltnkfbagfy4xs0ecglj5699u6f9a9hfliycmygtyusqxd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
</body>
</html>