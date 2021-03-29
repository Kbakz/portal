<?php
	class Painel{
		public static $cargos = [
			"0" => "Administrador",
			"1" => "Sub administrador",
			"2" => "Jornalista",
			"3" => "Editor"
		];

		public static function pegaCargo($i){
			return self::$cargos[$i];
		}

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

		public static function imagemValida($imagem){
			if($imagem['type'] == 'image/jpeg' ||
				$imagem['type'] == 'imagem/jpg' ||
				$imagem['type'] == 'image/png'){

				$tamanho = intval($imagem['size']/1024);
				if($tamanho < 1000)
					return true;
				else
					return false;
			}else{
				return false;
			}
		}

		public static function uploadFile($file){
			$formatoArquivo = explode('.',$file['name']);
			$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
			if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome))
				return $imagemNome;
			else
				return false;
		}

		public static function deleteFile($file){
			@unlink('uploads/'.$file);
		}

		public static function deletar($tabela,$id){
				$sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = ?");
				$sql->execute(array($id));
		}

		public static function selecionar($tabela,$query,$arr){
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE $query = ?");
			$sql->execute(array($arr));
			return $sql->fetch();
		}
	}
?>