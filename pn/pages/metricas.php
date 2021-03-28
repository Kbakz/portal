<?php
	$usuariosOnline = Painel::listarUsuarios();
?>
<div class="conteudo-painel">
	<h1><i class="fas fa-cogs"></i> Painel de controle - Kel Island</h1>
	<h2><i class="far fa-chart-bar"></i> - Métricas</h2>
	<div class="metricas">
		<div class="metrica-single">
			<h3>Usuarios online</h3>
			<p><?php echo count($usuariosOnline);?></p>
		</div><!--metrica-single-->

		<div class="metrica-single">
			<h3>Visitas hoje</h3>
			<p>5</p>
		</div><!--metrica-single-->

		<div class="metrica-single">
			<h3>Total de visitas</h3>
			<p>10</p>
		</div><!--metrica-single-->
	</div><!--metricas-->
</div><!--conteudo-painel-->