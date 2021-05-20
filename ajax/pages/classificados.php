<div class="box-content">
        <?php
        $busca = '';
        if (isset($_POST['acao'])) {
            $busca = $_POST['busca'];
        }
    ?>
<div class="center">
    <form class="form-classificados" method="post">
        <input type="text" name="busca" placeholder="Buscar...">
        <button type="submit" name="acao"><i class="fas fa-search"></i></button>
    </form>
</div>
    <div class="center">
    	<div class="classificados">
    		<?php
                $classificados = MySql::conectar()->prepare("SELECT * FROM `tb_admin.classificados` WHERE nome LIKE '%$busca%'");
                $classificados->execute();
                $classificados = $classificados->fetchAll();
                if(isset($_POST['busca'])){
                   $classificadoCount = count($classificados);
                    if($classificadoCount == 0){
                        echo '<h2>Nenhum resultado encontrado</h2>';
                    }else{
                         echo '<h2>Busca realizada com sucesso</h2>';
                    }
                }else{
                     echo '<h2>Todos os classificados</h2>';
                }
            ?>
            <div class="classificados-container">
                <?php
        			foreach ($classificados as $key => $value) {
        		?>
        		<div class="classificado-single">
        			<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['img']?>">
        			<div class="classificado-texto">
        				<h2><?php echo $value['nome']?></h2>
        				<p>Funcionamento: <time><?php echo $value['horario_abrir']?></time> - <time><?php echo $value['horario_fechar']?></time></p>
        				<span><?php echo $value['dias']?></span>
        				<p><?php echo $value['telefone']?></p>
        				<a href="http://<?php echo $value['link']?>" target="_blank">Mais informações</a>
        			</div>
        		</div>
        	   <?php }?>
            </div><!--classificados-container-->
    	</div>
    </div>
</div><!--box-content-->