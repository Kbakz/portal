<?php
	class Permissao{
		public static function verificaPermissaoMenu($permissao){
			if($_SESSION['cargo'] > $permissao){
				echo 'style="display:none;"';
			}else{
				return;
			}
		}

		public static function verificaPermissaoPagina($permissao){
			if($_SESSION['cargo'] > $permissao){
				header('location:'.INCLUDE_PATH_PAINEL);
				die();
			}else{
				return;
			}
		}
	}
?>