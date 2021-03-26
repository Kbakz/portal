$(function(){
	srollMenu();
	ocultarSidebar();

	function srollMenu(){
		$(window).scroll(function(){
			var windowTop = $(window).scrollTop();
	
			console.log(windowTop);
			if(windowTop != 0){
				$('header').addClass('scroll');
				$('aside').addClass('scroll');
				$('section').addClass('scroll');
			}else{
				$('header').removeClass('scroll');
				$('aside').removeClass('scroll');
				$('section').removeClass('scroll');
			}
		})
	
		$('nav.mobile span').click(function(){
			$('nav.mobile ul').stop().slideToggle();
		})
	}

	function ocultarSidebar(){
		$('aside p').click(function(){
			var aside = $('aside');
			var offSet = aside.offset().left;
			var icone = $('aside > p > i');

			console.log(offSet);

			if(offSet == -300){
				aside.animate({'left':'0'});
				icone.removeClass('fa-angle-double-right');
				icone.addClass('fa-angle-double-left');
			}else{
				aside.animate({'left':'-300px'});
				icone.removeClass('fa-angle-double-left');
				icone.addClass('fa-angle-double-right');
			}

			

		})
	}
	
})