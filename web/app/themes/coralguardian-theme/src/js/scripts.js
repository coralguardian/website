/*include /libs/jquery.core.js*/
/*include /libs/jquery.easing.js*/
/*include /libs/slick.js*/
/*include /libs/smoothscroll.js*/
/*include /libs/anime.js*/
/*include /libs/move.js*/

var Master = {
    onready : function(){
        $('.cbo-title-2, .hero-title, .page-single-content.cg-cms h2').addClass('cg-wavy');
        cg_Move.init_wavy();
        CBO_Smoothscroll.init(); // Initialisation Smoothscroll.js
    },
    onscroll : function(){
        cg_Move.scroll_slides();
    },
};

$(window).on( 'scroll', function(){
    Master.onscroll();
});

$(document).ready(function() {
	Master.onready();
	
	//////////////// STICKY ////////////////
	$(window).scroll(function(){
		if($(window).scrollTop()>80){
			$("header").addClass('header-scroll');
		}else{
			$("header").removeClass('header-scroll');
		}
	})
	.scroll();

	/////////////////// SMARTPHONE NAVIGATION ///////////////////
	$('header .burger-menu').on('click', function(){
		$('.header-nav').toggleClass('header-nav-open');
		$('.burger-menu').toggleClass('burger-menu-cross');
		$('header').toggleClass('active');
		$('body').toggleClass('body-popin-open');
	});

	/////////////////// SLIDER ACTUS ///////////////////
	$('.cbo-sectionrelation .sectionrelation-listing').slick({
		arrows : false,
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 1299,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]   
	});

	//////////////////// VIDEO PLAYER ////////////////////
	$('.video-player i').click(function(event){
		event.preventDefault();
		var video = $ ("#moniframe");
		$(".js-video").append(video);
		$(this).hide(); 
	});
	$('#play-video').on('click', function(ev) {
		$("#video")[0].src += "?autoplay=1&cc_load_policy=1&rel=0&amp;showinfo=0";
		ev.preventDefault();
	});
	$('.video-player i').click(function(){
		$('.video-cover').addClass('video-cover-none');
	});

	//////////////////// TABS ////////////////////
	jQuery(".cg-onglet_title").click(function() {
		var $this = $(this);
		var tabId = $this.attr("id");
		var $section = $this.closest(".cbo-sectiononglets, .cbo-sectionteam, .cbo-sectiondonnes");

		$section.find(".cg-onglet_title").removeClass("active");
		$section.find(".cg-onglets_content").removeClass("active");
		$section.find(".onglet-pic").removeClass("active toto");

		$this.addClass("active");
		jQuery("#pic_"+tabId).addClass("active toto");
		jQuery("#contenu_"+tabId).addClass("active");
	});

	//////////////////// SEARCH MODALE ////////////////////
	$('.search-button').on('click', function(){
		$('.cg-overlay-search').toggleClass('cg-overlay-search-open');
	});
	// Ferme la modale et l'overlay
	$('.cg-overlay-search .search-close').on('click', function(){
		$('.cg-overlay-search').removeClass('cg-overlay-search-open');
	});

	//////////////// MODALE NEWSLETTER ////////////////
	$('.modale-close').on('click', function() {
		$('.modale-overlay').removeClass('overlay--open');
		$('.modale-newsletter').removeClass('newsletter--open');
	});

	(function($) {
		function getCookie(name) {
			setPos = document.cookie.indexOf(name + '='), stopPos = document.cookie.indexOf(';', setPos);
			return !~setPos ? null : document.cookie.substring(
					setPos, ~stopPos ? stopPos : undefined).split('=')[1];
		}
		function setCookie(name, val, days, path) {
			var cookie = name + "=" +  escape(val) + "";
			if (days) {
				var date = new Date();
				date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
				cookie += ";expires=" + date.toGMTString();
			}
			cookie += ";" + (path || "path=/");
			document.cookie = cookie;
		}

		$(document).ready(function(){
			var bandeauCookie = getCookie("bandeauCookie");
			if (!bandeauCookie) {
				setTimeout(function() {
					$('#myModal').show();
				},10000);
				$("#myModal-close").click(function(){
					setCookie("bandeauCookie", 1, 0);
					$("#myModal").fadeOut('fast');
				});
			} else {
				$("#myModal").hide();
			}
		});

		
	})(jQuery);


	//////////////// SCROLL ANIMATIONS ////////////////
	var scroll = window.requestAnimationFrame || function(callback){ window.setTimeout(callback, 1000/60)};
	var elementsToShow = document.querySelectorAll('.slide-up, .slide-up, .slide-right, .slide-left, .scale-up, .scale-down'); 

	function loop() {
		Array.prototype.forEach.call(elementsToShow, function(element){
			if (isElementInViewport(element)) {
				element.classList.add('anim-scroll');
			} else {
				element.classList.remove('anim-scroll');
			}
		});

		scroll(loop);
	}	
	loop();

	function isElementInViewport(el) {
		if (typeof jQuery === "function" && el instanceof jQuery) {
			el = el[0];
		}
		var rect = el.getBoundingClientRect();
		return (
			(rect.top <= 0&& rect.bottom >= 0)||(rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) && rect.top <= (window.innerHeight || document.documentElement.clientHeight))||(rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
		);
	}

	/////////////////// PERCENT BAR ///////////////////
	var item = $(".bar-chart");
	var drawDelay = 1000;
	item.each(function() {
		$(this).animate(
			{
				height: $(this).attr("data-percent") + "px" 
			},
			drawDelay
		) 
	});

	/////////////////// SLIDER PARTNERS ///////////////////
	$('.cbo-partners .list-el').slick({
		arrows : false,
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 6,
		slidesToScroll: 4,
		autoplay: false,
		responsive: [
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 2
				}
			}, 
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 500,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			}
		]   
	});

	/////////////////// SLIDER D'IMAGES ///////////////////
	$('.slider-container').slick({
		arrows : false,
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
	});

	//////////////////// ACCORDION ////////////////////
	jQuery('.toggle').click(function(e) {
		e.preventDefault();
		var $this = jQuery(this);
		if ($this.next().hasClass('show')) {
			$this.next().removeClass('show');
			$this.next().slideUp(350);
		} else {
			$this.next().toggleClass('show');
			$this.next().slideToggle(350);
		}
	});
	jQuery('.cg-accordeon_title').click(function(){
		jQuery(this).toggleClass('cg-accordeon_title_open');
	});

	/////////////////// RIPPLE EFFECT ///////////////////
	$('.ripple').on('click', function (e) {
		$(this).find('.ripple-after').remove();
		$(this).append('<div class="ripple-after"></div>');
		var ripple = $(this).find('.ripple-after');
		ripple.removeClass('animate');
		var x = parseInt(e.pageX - $(this).offset().left) - (ripple.width() / 2);
		var y = parseInt(e.pageY - $(this).offset().top) - (ripple.height() / 2);
		ripple.css({top: y, left: x}).addClass('animate');
	});

	/////////////////// MAPBOX ///////////////////
		// if ($('body #map').length > 0){
		// 	mapboxgl.accessToken = 'pk.eyJ1IjoiMjBoMjAiLCJhIjoiY2tkNzBjODBjMDByNjJybnY3c2I0YWhzdyJ9.i-WnsBScxrVs7RjUQnkBnQ';
		// 	var map = new mapboxgl.Map({
		// 		container: 'map',
		// 		zoom: 4,
		// 		center: [119.877830, -8.400699],
		// 		style: 'mapbox://styles/mapbox/satellite-v9',
		// 	});

		// 	map.on('load', function() {
		// 		map.loadImage('../wp-content/themes/coralguardian/library/img/marker.png', function(error, image) {
		// 			if (error) throw error;
		// 			map.addImage('marker', image);
		// 			map.addLayer({
		// 				"id": "points",
		// 				"type": "symbol",
		// 				"source": {
		// 					"type": "geojson",
		// 					"data": {
		// 						"type": "FeatureCollection",
		// 						"features": [{
		// 							"type": "Feature",
		// 							"geometry": {
		// 								"type": "Point",
		// 								"coordinates": [119.877830, -8.400699]
		// 							}
		// 						}]
		// 					}
		// 				},
		// 				"layout": {
		// 					"icon-image": "marker",
		// 					"icon-size": 1
		// 				}
		// 			});
		// 		});
		// 	});
		// }
});

