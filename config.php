<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	
	$autoload = function($class){
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/Portal/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'pn/');
	define('BASE_DIR_PAINEL',__DIR__.'/pn');

	define('HOST','localhost');
	define('DATABASE','portal');
	define('USUARIO','root');
	define('SENHA','');
?>