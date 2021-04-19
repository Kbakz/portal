<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}

		include('classes/'.$class.'.php');
	};
	spl_autoload_extensions('.php');
	spl_autoload_register($autoload);

	//local
	define('INCLUDE_PATH', 'http://localhost/Portal/');

	define('HOST', 'localhost');
	define('DATABASE', 'portal');
	define('USUARIO', 'root');
	define('SENHA', '');
	
	//Servidor
	/*
	define('INCLUDE_PATH', 'https://portfoliokevinfreire.com/');

	define('HOST', 'localhost');
	define('DATABASE', 'portif49_portal');
	define('USUARIO', 'portif49_kevin');
	define('SENHA', '18p3wFe3uB');
	*/

	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'pn/');
	define('BASE_DIR_PAINEL',__DIR__.'/pn');
?>