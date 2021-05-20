<?php
	include('../config.php');
	$data = [];
	$assunto = 'Nova mensagem';
	$corpo = '';
	foreach ($_POST as $key => $value) {
		$corpo.= ucfirst($key).": ".$value;
		$corpo.='<hr>';
	}
	$info = ['assunto'=>$assunto,'corpo'=>$corpo];
	$mail = new Mail('portal.portfoliokevinfreire.com','contato@portfoliokevinfreire.com','1245K&vin','Kevin');
	$mail->addAdress('contato@portfoliokevinfreire.com','Kevin');
	$mail->formatarEmail($info);
	if($mail->enviarEmail()){
		$data['sucesso'] = true;
	}else{
		$data['erro'] = true;
	}

	die(json_encode($data));
?>