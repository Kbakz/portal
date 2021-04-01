<div class="box-content">
    <div class="center">
    	<form class="form-classificado">
    		<input type="text" name="pesquisa">
    		<input type="submit" value="Buscar">
    	</form>
    	<div class="classificados">
    		<?php
                $classificados = MySql::conectar()->prepare("SELECT * FROM `tb_admin.classificados`");
                $classificados->execute();
                $classificados = $classificados->fetchAll();
    			foreach ($classificados as $key => $value) {
    		?>
    		<div class="classificado-single">
    			<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['img']?>">
    			<div class="classificado-texto">
    				<h2><?php echo $value['nome']?></h2>
    				<p>Funcionamento: <time><?php echo $value['horario_abrir']?></time> - <time><?php echo $value['horario_fechar']?></time></p>
    				<span><?php echo $value['dias']?></span>
    				<p><?php echo $value['telefone']?></p>
    				<a href="http://<?php echo $value['link']?>">Mais informações</a>
    			</div>
    		</div>
    		<?php }?>
    	</div>
    </div>
</div><!--box-content-->