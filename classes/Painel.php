<?php
	class Painel{
		public static $cargos = [
			"0" => "administradoe",
			"1" => "sub administrador",
			"2" => "jornalista",
			"3" => "editor"
		];

		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}

		public static function logout(){
			session_destroy();
			header('location: '.INCLUDE_PATH_PAINEL);
		}

		public static function alert($tipo,$mensagem){
			if ($tipo == 'sucesso') {
				echo '<div class="box-alert sucesso"><i class="fas fa-check-circle"></i> '.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="box-alert erro"><i class="fas fa-times-circle"></i> '.$mensagem.'</div>';
			}
		}

		public static function carregarPagina(){
			if(isset($_GET['url'])){
				$url = explode('/',$_GET['url'])[0];
				if(file_exists('pages/'.$url.'.php'))
					include('pages/'.$url.'.php');
				else
					header('location: '.INCLUDE_PATH_PAINEL);
					
			}else{
				include('pages/metricas.php');
			}
		}

		public static function listarUsuarios(){
			self::limparUsuariosOnline();
			$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function limparUsuariosOnline(){
			$date = date('Y-m-d H:i:s');
			$sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE ");
		}
	}
?>