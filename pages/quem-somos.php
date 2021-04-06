<?php
    
?>
<div class="box-content">
    <div class="center">
    	<div class="info">
    		<div class="titulo-site">
    			<h1>Sobre nós</h1>
    		</div>
    		<div class="info-container">
    			<div class="logo">
                    <img src="<?php echo INCLUDE_PATH_PAINEL?>/uploads/<?php echo $sobre['img_sobre'];?>">         
                </div>
    			<p><?php echo substr($sobre['texto_sobre'],0,600);?></p>
    		</div>
    	</div>
    	<div class="midia">
    		<div class="titulo-site">
    			<h2>Siga a gente em nossas redes sociais</h2>
    		</div>
    		<div class="midia-container">
    			<div class="midia-single">
    				<a href="http://<?php echo $sobre['social_1'];?>" target="_blank"><i class="<?php echo $sobre['icone1'];?>"></i> Noticias inc</a>
    			</div>
	    		<div class="midia-single">
	    			<a href="http://<?php echo $sobre['social_2'];?>" target="_blank"><i class="<?php echo $sobre['icone2'];?>"></i> @inc.noticias</a>
	    		</div>
	    		<div class="midia-single">
	    			<a href="http://<?php echo $sobre['social_3'];?>" target="_blank"><i class="<?php echo $sobre['icone3'];?>"></i> @noticias-inc</a>
	    		</div>
    		</div>
    	</div>
    	<div id="contato" class="contato">
    		<div class="titulo-site">
    			<h2>Tire suas dúvidas</h2>
    		</div>
	    	<form>
	    		<label for="nome">Nome:</label>
	    		<input type="text" name="nome" id="nome">
	    		<label for="email">E-mail:</label>
	    		<input type="email" name="email" id="email">
	    		<label for="mensagem">Mensagem:</label>
	    		<textarea name="mensagem" id="mensagem"></textarea>
	    		<input type="submit" name="enviar" value="Enviar">
	    	</form>
    	</div>
    </div>
</div><!--box-content-->
