<?php
	ob_start();
	include('../config.php');

	if(Painel::logado()){
		include('main.php');
	}else{
		include('login.php');
	}
	ob_end_flush();
?>