<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
	<title>Login</title>
</head>
<body>
	<section class="box-login center">
		<form method="post">
			<?php
			if(isset($_POST['acao'])){
				$usuario = $_POST['usuario'];
				$senha = $_POST['senha'];
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE usuario = ? AND senha = ?");
				$sql->execute(array($usuario,$senha));
				if ($usuario == ''){
					Painel::alert('erro','Adicione o campo usuario');
				}else if($senha == ''){
					Painel::alert('erro','Adicione o campo senha');
				}else{
					if($sql->rowCount() == 1){
						$info = $sql->fetch();
						$_SESSION['login'] = true;
						$_SESSION['usuario'] = $usuario;
						$_SESSION['senha'] = $senha;
						$_SESSION['img'] = $info['img'];
						$_SESSION['nome'] = $info['nome'];
						$_SESSION['cargo'] = $info['cargo'];

						header('location: '.INCLUDE_PATH_PAINEL);
						die();
					}else{
						Painel::alert('erro','Usuario ou Senha incorreto!');
					}
				}
				
			}
			?>
			<h1>Faça seu login:</h1>
			<label for="usuario">Usuario:</label>
			<input id="usuario" type="text" name="usuario">
			<label for="senha">Senha:</label>
			<input id="senha" type="password" name="senha">
			<input type="submit" name="acao">
		</form>
	</section><!--box-login-->
</body>
</html>