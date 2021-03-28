<?php
	class Painel{
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
	}
?>