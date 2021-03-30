$(function(){
	fecharMenu();

	function fecharMenu(){
		$('p.btn-menu').click(function(){
			var menuPainel = $('.menu-painel');
			var offSet = menuPainel.offset().left;
			var botao = $('p.btn-menu');
			var icone = $('p.btn-menu > i');

			if (offSet == 0) {
				//fechar menu
				menuPainel.animate({'left':'-300px'});
				botao.animate({'left':'0px'});
				icone.removeClass('fa-angle-double-left');
				icone.addClass('fa-angle-double-right');
			}else{
				//abrir menu
				menuPainel.animate({'left':'0'});
				botao.animate({'left':'300px'});
				icone.removeClass('fa-angle-double-right');
				icone.addClass('fa-angle-double-left');
			}
		})
		
	}

	 tinymce.init({
        selector: '#tinymce',
        plugins: 'image imagetools autosave link emoticons'
      });
})