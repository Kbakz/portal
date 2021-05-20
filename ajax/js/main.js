$(function(){
	srollMenu();
	ocultarSidebar();
	passarSlide();
	//enviarForm();

	function srollMenu(){
		$(window).scroll(function(){
			var windowTop = $(window).scrollTop();
			if(windowTop != 0){
				$('header').addClass('scroll');
				$('aside').addClass('scroll');
				$('section').addClass('scroll');
				$('footer').addClass('scroll');
			}else{
				$('header').removeClass('scroll');
				$('aside').removeClass('scroll');
				$('section').removeClass('scroll');
				$('footer').removeClass('scroll');
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
			var widthSize = $(window).width();

			if(offSet == -300){
				aside.animate({'left':'0'});
				icone.removeClass('fa-angle-double-right');
				icone.addClass('fa-angle-double-left');
			}else{
				aside.animate({'left':'-300px'});
				icone.removeClass('fa-angle-double-left');
				icone.addClass('fa-angle-double-right');
			}

			if(widthSize <= 360){
					if(offSet == -230){
						aside.stop().animate({'left':'0'});
						icone.removeClass('fa-angle-double-right');
						icone.addClass('fa-angle-double-left');
					}else{
						aside.stop().animate({'left':'-230px'});
						icone.removeClass('fa-angle-double-left');
						icone.addClass('fa-angle-double-right');
					}
				}

			$(window).resize(function(){

				if(widthSize <= 360){
					if(offSet == -230){
						aside.stop().animate({'left':'0'});
						icone.removeClass('fa-angle-double-right');
						icone.addClass('fa-angle-double-left');
					}else{
						aside.stop().animate({'left':'-230px'});
						icone.removeClass('fa-angle-double-left');
						icone.addClass('fa-angle-double-right');
					}
				}
			})

		})
	}

	$('select#cat').change(function(){
		location.href=include_path+$(this).val();
	});

	$('select#ordem').change(function(){
		$('form#form-ordem').submit();
	});

	function passarSlide(){
		$('.publi-single').jdSlider({
			  // enable/disable the carousel
			  isUse: true,

			  // wrapper element
			  wrap: null,

			  // default CSS selectors
			  slide: '.slide-area',
			  prev: '.prev',
			  next: '.next',
			  indicate: '.indicate-area',
			  auto: '.auto', 
			  playClass: 'play',
			  pauseClass: 'pause',
			  noSliderClass: 'slider--none', 
			  willFocusClass: 'will-focus', 
			  unusedClass: 'hidden', 

			  // how many slides to display at a time
			  slideShow: 3,

			  // how many slides to scroll at a time
			  // slideTo <a href="https://www.jqueryscript.net/tags.php?/Scroll/">Scroll</a>: 3,

			  // start slide
			  slideStart: 1,

			  // margin property
			  margin: null, 

			  // animation speed
			  speed: 500, 

			  // easing
			  timingFunction: 'ease',
			  easing: 'swing',

			  // autoplay interval
			  interval: 4000, 

			  // touch throttle
			  touchDistance: 20, 

			  // resistance ratio
			  resistanceRatio: .5,

			  // is overflow
			  isOverflow: false,

			  // shows indicator
			  isIndicate: true,

			  // is autoplay
			  isAuto: true,

			  // is infinite loop
			  isLoop: true,

			  // false: use fade animation instead
			  isSliding: true,

			  // pause on hover
			  isCursor: true,

			  // enable touch event
			  isTouch: true,

			  // enable drag event
			  isDrag: true,

			  // enable swipe resistance
			  isResistance: true,

			  // auto playback
			  isCustomAuto: true, 

			  // auto playback
			  autoState: 'auto',

			  // custom indicator
			  indicateList: function (i) {
			      return '<a href="#">' + i + '</a>'; 
			  },

			  // progress function
			  progress: function () {}

		});
	}

	/*
	function enviarForm(){
        $('form.ajax').ajaxForm({
             success:function(){
             	alert('teste');         
                //$('form.ajax')[0].reset();
            }
        });
	}
	*/
	
})