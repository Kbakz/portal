<?php
	session_start();
	$autoload = function($class){
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/Portal/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'pn/');

	define('HOST','localhost');
	define('DATABASE','portal');
	define('USUARIO','root');
	define('SENHA','');
?>