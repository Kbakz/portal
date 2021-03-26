<?php
	define('INCLUDE_PATH', 'http://localhost/Portal/');

	$autoload = function($class){
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);
?>