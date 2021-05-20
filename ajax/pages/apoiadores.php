<div class="box-content">
    <div class="center">
    	<div class="apoiadores">
            <div class="titulo-site">
                <h2>Conheça nossos apoiadores</h2>
            </div>
            <div class="apoiador-container">
                <?php
                    $apoiadores = MySql::conectar()->prepare("SELECT * FROM `tb_admin.apoiadores`");
                    $apoiadores->execute();
                    $apoiadores = $apoiadores->fetchAll();
                    foreach ($apoiadores as $key => $value) {
                ?>
                <div class="apoiador-single">
                    <img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['imagem']?>">
                    <div class="apoiador-texto">
                        <p><?php echo $value['nome']?></p>
                        <a href="http://<?php echo $value['link']?>" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
                <?php }?>
            </div>
    	</div>
        <div class="form-apoiador">
            <div class="titulo-site">
                <h2>Faça parte dos nossos apoiadores</h2>
            </div>
            <p>Preencha o formulario abaixo</p>
            <form class="ajax" method="post" action="<?php echo INCLUDE_PATH ?>formulario.php">
                <label for="nome">Nome da empresa ou do seu negocio:</label>
                <input type="text" name="nome" placeholder="ex:minha empresa" id="nome">
                <label for="email">E-mail para contato:</label>
                <input type="email" name="email" placeholder="ex:exemplo@empresa.com" id="email">
                <label for="link">Link da página ou blog:</label>
                <input type="url" name="link" placeholder="ex:https://empresa.com/exemplo" id="link">
                <label for="mensagem">Mande sua mensagem:</label>
                <textarea placeholder="ex:gostaria de fazer parte dos apoiadores..." id="mensagem"></textarea>
                <input type="hidden" name="identificador" value="Novo_apoiador">
                <input type="submit">
            </form>
        </div>
    </div>
</div><!--box-content-->