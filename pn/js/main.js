$(function(){
	fecharMenu();
	limitarCaracter();

	tinymce.init({
        selector: '#tinymce',
        plugins: 'image imagetools emoticons'
      });

	 $('.horario').mask('00:00');
	 $('.telefone').mask('(00) 00000-0000');

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

	function limitarCaracter(){
		var campo = $('#limitar');
		var contador = $('span.contador');
		var campoValor = campo.val();
		var quant = campoValor.length;
		var limite = 600;
		contador.html('<span>'+quant+'/'+limite+'</span>');
		campo.keyup(function(){
			campoValor = campo.val();
			quant = campoValor.length;
			contador.html('<span>'+quant+'/'+limite+'</span>');
			if(quant >= limite){
				contador.css('color' , 'red');
				campo.keypress(function(){
					if(quant >= limite)
						return false;
					else
						return true;
				})
			}else{
				contador.css('color' , '#646464');
			}
		})
		
	}
})