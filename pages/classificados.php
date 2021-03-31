<div class="box-content">
    <div class="center">
    	<form class="form-classificado">
    		<input type="text" name="pesquisa">
    		<input type="submit" value="Buscar">
    	</form>
    	<div class="classificados">
    		<?php 
    			for ($i=0; $i < 8; $i++) { 
    		?>
    		<div class="classificado-single">
    			<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/60620bb1a8c0b.jpg">
    			<div class="classificado-texto">
    				<h2>Nome da loja</h2>
    				<p>Funcionamento: <time>08:30</time> - <time>18:30</time></p>
    				<span>Segunda a Sexta</span>
    				<p>(74) 9 9900-0123</p>
    				<a href="">Mais informações</a>
    			</div>
    		</div>
    		<?php }?>
    	</div>
    </div>
</div><!--box-content-->