<?php
	class Site{
		public static function selectedMenu($par){
			$url = explode('/',@$_GET['url'])[0];
			if($url == $par)
				echo 'class="selected"';
		}

		public static function atualizarUsuario(){
			if(isset($_SESSION['online'])){
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$check = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
				$check->execute(array($_SESSION['online']));

				if($check->rowCount() == 1){
					$sql = MySql::conectar()->prepare("UPDATE `tb_admin.online` SET ultima_acao = ? WHERE token = ?");
					$sql->execute(array($horarioAtual,$token));
				}else{
					if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
					    $ip = $_SERVER['HTTP_CLIENT_IP'];
					} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
					    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					} else {
					    $ip = $_SERVER['REMOTE_ADDR'];
					}

					$token = $_SESSION['online'];
					$horarioAtual = date('Y-m-d H:i:s');
					$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES(null,?,?,?)");
					$sql->execute(array($ip,$horarioAtual,$token));
				}
			}else{
				$_SESSION['online'] = uniqid();
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				    $ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
				    $ip = $_SERVER['REMOTE_ADDR'];
				}

				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES(null,?,?,?)");
				$sql->execute(array($ip,$horarioAtual,$token));
			}
		}

		public static function contarVisitas(){
			if(!isset($_COOKIE['visita'])){
				setcookie('visita','true',time() + (60*60*24*7));
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				    $ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
				    $ip = $_SERVER['REMOTE_ADDR'];
				}
				$data = date('Y-m-d');
				$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.visitas` VALUES(null,?,?)");
				$sql->execute(array($ip,$data));
			}
		}
	}
?>