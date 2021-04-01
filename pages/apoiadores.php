<div class="box-content">
    <div class="center">
    	<div class="apoiadores">
            <div class="titulo-site">
                <h2>Conheça nossos apoiadores</h2>
            </div>
            <div class="apoiador-container">
                <?php 
                    for ($i=0; $i < 6; $i++) { 
                ?>
                <div class="apoiador-single">
                    <img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/60620c0f0a39e.jpg">
                    <div class="apoiador-texto">
                        <p>Nome do apoiador</p>
                        <a href=""><i class="fas fa-external-link-alt"></i></a>
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
            <form>
                <label for="nome">Nome da empresa ou do seu negocio:</label>
                <input type="text" name="nome" placeholder="ex:minha empresa" id="nome">
                <label for="email">E-mail para contato:</label>
                <input type="email" name="email" placeholder="ex:empresa@gmail.com" id="email">
                <label for="link">Link da página ou blog:</label>
                <input type="url" name="link" placeholder="ex:https://instagram.com/empresa" id="link">
                <label for="mensagem">Mande sua mensagem:</label>
                <textarea placeholder="ex:gostaria de fazer parte dos apoiadores..." id="mensagem"></textarea>
                <input type="submit">
            </form>
        </div>
    </div>
</div><!--box-content-->