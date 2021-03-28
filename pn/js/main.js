$(function(){
	fecharMenu();

	function fecharMenu(){
		$('.menu-painel > p').click(function(){
			var menuPainel = $('.menu-painel');
			var offSet = menuPainel.offset().left;
			var icone = $('.menu-painel > p > i');

			if (offSet == 0) {
				//fechar menu
				menuPainel.animate({'left':'-300px'});
				icone.removeClass('fa-angle-double-left');
				icone.addClass('fa-angle-double-right');
			}else{
				//abrir menu
				menuPainel.animate({'left':'0'});
				icone.removeClass('fa-angle-double-right');
				icone.addClass('fa-angle-double-left');
			}
		})
		
	}
})