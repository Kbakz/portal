<?php
	class Usuario{
		public static function cadastrarUsuario($usuario,$senha,$img,$nome,$cargo){
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES(null,?,?,?,?,?)");
			$sql->execute(array($usuario,$senha,$img,$nome,$cargo));
		}

		public static function usuarioExistente($usuario){
			$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE usuario = ?");
			$sql->execute(array($usuario));
			if ($sql->rowCount() == 1) {
				return true;
			}else{
				return false;
			}
		}
	}
?>