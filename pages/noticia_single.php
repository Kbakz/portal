<?php
    $url = explode('/',$_GET['url']);
    $verifica_categoria = MySql::conectar()->prepare("SELECT * FROM `tb_admin.categoria` WHERE slug = ?");
    $verifica_categoria->execute(array($url[0]));

    if ($verifica_categoria->rowCount() == 0){
        Painel::redirect(INCLUDE_PATH.'noticias');
    }

    $categoria_info = $verifica_categoria->fetch();
    $post = MySql::conectar()->prepare("SELECT * FROM `tb_admin.noticias` WHERE slug = ? AND categoria_id = ?");
    $post->execute(array($url[1],$categoria_info['id']));

    if($post->rowCount() == 0){
        header('location: '.INCLUDE_PATH);
    }

    $post = $post->fetch();
?>
<div class="box-content">
    <div class="center">
        <div class="post-colum">
            <div class="post">
                <div class="titulo-site">
                    <h1><?php echo $post['titulo']; ?></h1>
                </div>
                <p><?php echo $post['lide']; ?></p>
                <div class="post-autor">
                    <p>Por: <b><?php echo $post['autor']; ?></b><a href=""><i class="fas fa-share-alt"></i></a></p>
                    <data><?php echo date('d/m/Y',strtotime($post['data'])); ?></data>
                </div>
                <hr>
                <img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $post['imagem']; ?>">
                <p>fonte: <?php echo $post['fonte']; ?></p>

                <article class="conteudo-post"><?php echo $post['conteudo']; ?></article>
            </div>
            <div class="relacionadas">
                <p>Mais notícias</p>
                <?php 
                    for ($i=0; $i < 5; $i++) { 
                ?>
                <div class="relacionadas-single">
                    <img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/6066386385f9e.jpeg">
                    <div class="relacionadas-titulo">
                        <h3>Titulo</h3>
                        <a href="">Ver mais</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div><!--box-content-->