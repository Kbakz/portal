<?php
	$usuariosOnline = Painel::listarUsuarios();

	$visitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
	$visitasTotais->execute();
	$visitasTotais = $visitasTotais->rowCount();

	$visitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE data = ?");
	$visitasHoje->execute(array(date('Y-m-d')));
	$visitasHoje = $visitasHoje->rowCount();
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
			<p><?php echo $visitasHoje?></p>
		</div><!--metrica-single-->

		<div class="metrica-single">
			<h3>Total de visitas</h3>
			<p><?php echo $visitasTotais;?></p>
		</div><!--metrica-single-->
	</div><!--metricas-->

	
</div><!--conteudo-painel-->
<div class="conteudo-painel">
	<div class="usuarios-online">
		<h2>Usuarios online</h2>
		<table>
				<tr>
				    <td>Ip</td>
				    <td>Última ação</td>
				</tr>
				<?php 
					foreach ($usuariosOnline as $key => $value) {
				?>
				<tr>
				    <td><?php echo $value['ip']?></td>
				    <td><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao']));?></td>
				</tr>
				<?php 
					}
				?>
		</table>
	</div><!--usuarios-online-->
</div><!--conteudo-painel-->