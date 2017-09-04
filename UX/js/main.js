function initMap() {
	var myLatLng = {
		lat: 19.4326077,
		lng: -99.13320799999997
	};

	map = new google.maps.Map(document.getElementById('map'), {
		center: myLatLng,
		scrollwheel: false,
		zoom: 16
	});

	// Cuidador 1
	var infowindow1 = new google.maps.InfoWindow;
	infowindow1.setContent('<h1 class="maps">LUIS ANGEL DÍAZ</h1>'
						 +'<p>15 años de experiencia</p>'
						 +'<div class="km-ranking">'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#"></a>'
						 +'</div>'
						 +'<div class="km-sellos maps">'
						 +'    <img src="images/icon/icon-sello-1.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-2.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-3.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-4.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-5.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-6.svg" height="40">'
					 	 +'</div>'
						 +'<div class="km-opciones maps">'
						 +'    <div class="precio">MXN $ 96</div>'
						 +'    <div class="distancia">A 96 km de tu búsqueda</div>'
						 +'    <a href="#" class="km-btn-primary-new stroke">CONÓCELO +</a>'
						 +'    <a href="./km-reservar-01.html" class="km-btn-primary-new basic">RESERVA</a>'
						 +'</div>');

	var marker1 = new google.maps.Marker({
		map: map,
		position: myLatLng,
		title: 'Hello World!'
	});

	marker1.addListener('click', function() {
		infowindow1.open(map, marker1);
	});

	// Cuidador 2
	var myLatLng2 = {
		lat: 19.43316706900312,
		lng: -99.13476705551147
	};
	var infowindow2 = new google.maps.InfoWindow;
	infowindow2.setContent('<h1 class="maps">MARÍA FERNANDA LÓPEZ</h1>'
						 +'<p>3 años de experiencia</p>'
						 +'<div class="km-ranking">'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#"></a>'
						 +'    <a href="#"></a>'
						 +'</div>'
						 +'<div class="km-sellos maps">'
						 +'    <img src="images/icon/icon-sello-1.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-2.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-3.svg" height="40">'
					 	 +'</div>'
						 +'<div class="km-opciones maps">'
						 +'    <div class="precio">MXN $ 150</div>'
						 +'    <div class="distancia">A 40 km de tu búsqueda</div>'
						 +'    <a href="#" class="km-btn-primary-new stroke">CONÓCELO +</a>'
						 +'    <a href="./km-reservar-01.html" class="km-btn-primary-new basic">RESERVA</a>'
						 +'</div>');

	var marker2 = new google.maps.Marker({
		map: map,
		position: myLatLng2,
		title: 'Hello World!'
	});

	marker2.addListener('click', function() {
		infowindow2.open(map, marker2);
	});

	// Cuidador 3
	var myLatLng3 = {
		lat: 19.43187200891054,
		lng: -99.1347187757492
	};
	var infowindow3 = new google.maps.InfoWindow;
	infowindow3.setContent('<h1 class="maps">SOFÍA VERGARA</h1>'
						 +'<p>2 años de experiencia</p>'
						 +'<div class="km-ranking">'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#"></a>'
						 +'</div>'
						 +'<div class="km-sellos maps">'
						 +'    <img src="images/icon/icon-sello-4.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-5.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-6.svg" height="40">'
					 	 +'</div>'
						 +'<div class="km-opciones maps">'
						 +'    <div class="precio">MXN $ 45</div>'
						 +'    <div class="distancia">A 40 km de tu búsqueda</div>'
						 +'    <a href="#" class="km-btn-primary-new stroke">CONÓCELO +</a>'
						 +'    <a href="./km-reservar-01.html" class="km-btn-primary-new basic">RESERVA</a>'
						 +'</div>');

	var marker3 = new google.maps.Marker({
		map: map,
		position: myLatLng3,
		title: 'Hello World!'
	});

	marker3.addListener('click', function() {
		infowindow3.open(map, marker3);
	});

	// Cuidador 4
	var myLatLng4 = {
		lat: 19.43200859776683,
		lng: -99.13255155086517
	};
	var infowindow4 = new google.maps.InfoWindow;
	infowindow4.setContent('<h1 class="maps">MÓNICA S.</h1>'
						 +'<p>18 años de experiencia</p>'
						 +'<div class="km-ranking">'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'    <a href="#" class="active"></a>'
						 +'</div>'
						 +'<div class="km-sellos maps">'
						 +'    <img src="images/icon/icon-sello-1.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-2.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-3.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-4.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-5.svg" height="40">'
						 +'    <img src="images/icon/icon-sello-6.svg" height="40">'
					 	 +'</div>'
						 +'<div class="km-opciones maps">'
						 +'    <div class="precio">MXN $ 68</div>'
						 +'    <div class="distancia">A 40 km de tu búsqueda</div>'
						 +'    <a href="#" class="km-btn-primary-new stroke">CONÓCELO +</a>'
						 +'    <a href="./km-reservar-01.html" class="km-btn-primary-new basic">RESERVA</a>'
						 +'</div>');

	var marker4 = new google.maps.Marker({
		map: map,
		position: myLatLng4,
		title: ''
	});

	marker4.addListener('click', function() {
		infowindow4.open(map, marker4);
	});
}

function playVideo(e) {
	var el = $(e);
	var p = el.parent().parent().parent();
	$('video', p).get(0).play();
	$('.km-testimonial-text').css('display','none');
	$('.img-testimoniales').css('display','none');
	$('.overlay').css('display','none');
}

function menu(){
	var w = $(window).width();
	if($(this).scrollTop() > 10) {
		$('.bg-transparent').addClass('bg-white');
		$('.navbar-brand img').attr('src', 'images/km-logos/km-logo-negro.png');


		$('.navbar-toggle img').attr('src', 'images/km-navbar-mobile-negro.svg');
		$('.nav-sesion .km-avatar').attr('src', 'images/km-sesion-cliente/avatar.png');
		$('.nav-sesion .dropdown-toggle img').css('width','40px');
		$('.nav li a').css('padding','10px 15px 8px');
		$('.nav-sesion .dropdown-toggle').css('padding','0px');
		$('.navbar-brand>img').css('height','40px');
		$('.nav li:first-child a').addClass('pd-tb11');
		$('.nav-sesion .dropdown-toggle').removeClass('pd-tb11');
		$('.nav-login').addClass('dnone');
		$('.navbar').css('padding-top', '15px');

		$('.bg-white-secondary').css('height','40px');

		if( w >= 768 ){
			$('a.km-nav-link, .nav-login li a').css('color','black');
			$('.bg-white-secondary a.km-nav-link, .bg-white-secondary .nav-login li a').css('color','black');
		}
	} else {
		$('.bg-transparent').removeClass('bg-white');
		$('.navbar-brand img').attr('src', 'images/km-logos/km-logo.png');

		$('.navbar-toggle img').attr('src', 'images/km-navbar-mobile.svg');		
		$('.nav-sesion .km-avatar').attr('src', 'images/km-sesion-cliente/avatar.png');
		$('.nav li a').css('padding','19px 15px 15px');
		$('.nav-sesion .dropdown-toggle img').css('width','45px');
		$('.nav-sesion .dropdown-toggle').css('padding','0px');
		$('.navbar-brand>img').css('height','60px');
		$('.nav li:first-child a').removeClass('pd-tb11');
		$('.nav-login').removeClass('dnone');
		$('.navbar').css('padding-top', '30px');

		$('.bg-white-secondary').css('height','100px');
		$('.bg-white-secondary .navbar-brand img').attr('src', 'images/km-logos/km-logo-negro.png');

		if( w >= 768 ){
			$('a.km-nav-link, .nav-login li a').css('color','white');
			$('.bg-white-secondary a.km-nav-link, .bg-white-secondary .nav-login li a').css('color','black');
		}
	}
}

function mapStatic( e ){
	var w = $(e);

	console.log(w.width());

	if ( w.width() > 991 ) {
		var scrollTop = w.scrollTop();
		var mapPrin = $(".km-caja-resultados");
		var mapElem = $(".km-caja-resultados .km-columna-der");
		var offset = mapPrin.offset();
		var topPre = 41;

		if ( scrollTop > 290 ) {
			mapElem.addClass("mapAbsolute");
			var topSumar = scrollTop - offset.top + topPre;
			mapElem.css({
				top: topSumar
			});
		} else {
			mapElem.removeClass("mapAbsolute");
		}
	}
}

$(window).resize(function() {
	menu();
});

$(window).scroll(function() {
	mapStatic( this );
});

$(document).ready(function(){
	menu();

	$(window).scroll(function() {
		menu();
	});

	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	$('.bxslider').bxSlider({
		buildPager: function(slideIndex){
			switch(slideIndex){
				case 0:
					return '<img src="images/km-testimoniales/thumbs/testimonial-1.jpg">';
				case 1:
					return '<img src="images/km-testimoniales/thumbs/testimonial-2.jpg">';
				case 2:
					return '<img src="images/km-testimoniales/thumbs/testimonial-3.jpg">';
			}
		}
	});
	$('.km-premium-slider').bxSlider({
		slideWidth: 200,
		minSlides: 1,
		maxSlides: 3,
		slideMargin: 10
	});


	$('.km-galeria-cuidador-slider').bxSlider({
	    slideWidth: 200,
	    minSlides: 1,
	    maxSlides: 3,
	    slideMargin: 10
	});

	$('.km-opcion').on('click', function(e) {
		$(this).toggleClass('km-opcionactivo');
	});

	$('.km-servicio-opcion').on('click', function(e) {
		$(this).toggleClass('km-servicio-opcionactivo');
	});

	$(document).on("click", '.show-map-mobile', function ( e ) {
		e.preventDefault();
		$(".km-map-content").addClass("showMap");
	});

	$(document).on("click", '.km-map-content .km-map-close', function ( e ) {
		e.preventDefault();
		$(".km-map-content").removeClass("showMap");
	});

	$(document).on("click", '.page-reservation .km-quantity .km-minus', function ( e ) {
		e.preventDefault();
		var el = $(this);
		var div = el.parent();
		var span = $(".km-number", div);
		if ( span.html() > 1 ) {
			span.html( span.html() - 1 );
		}

		if ( span.html() <= 1 ) {
			el.addClass("disabled");
		}
	});

	$(document).on("click", '.page-reservation .km-quantity .km-plus', function ( e ) {
		e.preventDefault();
		var el = $(this);
		var div = el.parent();
		var span = $(".km-number", div);
		var minus = $(".km-minus", div);
		span.html( parseInt(span.html()) + 1 );

		if ( span.html() > 1 ) {
			minus.removeClass("disabled");
		}
	});

	$(document).on("change", '.page-reservation .km-height-select', function ( e ) {
		e.preventDefault();
		var el = $(this);
		el.removeClass("small");
		el.removeClass("medium");
		el.removeClass("large");
		el.removeClass("extra-large");

		el.addClass( el.val() );
	});

	$(document).on("click", '.page-reservation .optionCheckout', function ( e ) {
		e.preventDefault();
		var el = $(this);
		el.toggleClass("active");
	});

	$(document).on("click", '.page-reservation .km-method-paid-options .km-method-paid-option', function ( e ) {
		e.preventDefault();
		var el = $(this);
		$(".km-method-paid-option", el.parent()).removeClass("active");

		el.addClass("active");

		$(".km-end-btn-form-disabled").hide();
		$(".km-end-btn-form-enabled").show();

		if ( el.hasClass("km-option-deposit") ) {
			$(".page-reservation .km-detail-paid-deposit").slideDown("fast");
		} else {
			$(".page-reservation .km-detail-paid-deposit").slideUp("fast");
		}
	});

	$(document).on("click", '.page-reservation .list-dropdown .km-tab-link', function ( e ) {
		e.preventDefault();
		var el = $(this);
		$(".km-tab-content", el.parent()).slideToggle("fast");
	});

	var $date_f = $(".date_from");
	var $date_t = $(".date_to");

	$date_f.datepicker({
		language: 'es',
		onSelect: function (fd, date) {
			$date_t.data('datepicker').update('minDate', date);
			$date_t.focus();
		}
	});

	$date_t.datepicker({
		language: 'es',
		onSelect: function (fd, date) {
			$date_f.data('datepicker').update('maxDate', date);
		}
	});

	$(document).on("focus", "input.input-label-placeholder", function(){
		$(this).parent().addClass("focus");
	}).on("blur", "input.input-label-placeholder", function(){
		let i = $(this);
		if ( i.val() !== "" ) $(this).parent().addClass("focused");
		else $(this).parent().removeClass("focused");

		$(this).parent().removeClass("focus");
	});

	$(document).on("click", '.popup-registro-cuidador .km-btn-correo', function ( e ) {
		e.preventDefault();

		$(".popup-content-cuidador").hide();
		$(".popup-registro-cuidador-correo").fadeIn("fast");
	});

	$(document).on("click", '.popup-registro-cuidador-correo .km-link-login', function ( e ) {
		e.preventDefault();

		$(".popup-content-cuidador").hide();
		$(".popup-registro-cuidador").fadeIn("fast");
	});


	$(document).on("click", '.popup-registro-cuidador-correo .registro-exitoso', function ( e ) {
		e.preventDefault();

		$(".popup-content-cuidador").hide();
		$(".popup-registro-exitoso").fadeIn("fast");
	});

	$(document).on("click", '.paso1', function ( e ) {
		e.preventDefault();

		$(".popup-content-cuidador").hide();
		$(".popup-registro-cuidador-paso1").fadeIn("fast");
	});

	$(document).on("click", '.paso2', function ( e ) {
		e.preventDefault();

		$(".popup-content-cuidador").hide();
		$(".popup-registro-cuidador-paso2").fadeIn("fast");
	});

	// POPUP INICIAR SESIÓN
	$(document).on("click", '.popup-iniciar-sesion-1 .km-btn-contraseña-olvidada', function ( e ) {
		e.preventDefault();

		$(".popup-iniciar-sesion-1").hide();
		$(".popup-olvidaste-contrasena").fadeIn("fast");
	});
	$(document).on("click", '.popup-registrarte-1 .km-btn-popup-registrarte-1', function ( e ) {
		e.preventDefault();

		$(".popup-registrarte-1").hide();
		$(".popup-registrarte-nuevo-correo").fadeIn("fast");
	});
	$(document).on("click", '.popup-registrarte-nuevo-correo .km-btn-popup-registrarte-nuevo-correo', function ( e ) {
		e.preventDefault();

		$(".popup-registrarte-nuevo-correo").hide();
		$(".popup-registrarte-datos-mascota").fadeIn("fast");
	});
	$(document).on("click", '.popup-registrarte-datos-mascota .km-btn-popup-registrarte-datos-mascota', function ( e ) {
		e.preventDefault();

		$(".popup-registrarte-datos-mascota").hide();
		$(".popup-registrarte-final").fadeIn("fast");
	});
	// FIN POPUP INICIAR SESIÓN
	$(document).on("click", '.popup-registro-cuidador .km-btn-popup-registro-cuidador', function ( e ) {
		e.preventDefault();

		$(".popup-registro-cuidador").hide();
		$(".popup-registro-cuidador-correo").fadeIn("fast");
	});
	$(document).on("click", '.popup-registro-cuidador-correo .km-btn-popup-registro-cuidador-correo', function ( e ) {
		e.preventDefault();

		$(".popup-registro-cuidador-correo").hide();
		$(".popup-registro-exitoso").fadeIn("fast");
	});
	$(document).on("click", '.popup-registro-exitoso .km-btn-popup-registro-exitoso', function ( e ) {
		e.preventDefault();

		$(".popup-registro-exitoso").hide();
		$(".popup-registro-cuidador-paso1").fadeIn("fast");
	});

	$(document).on("click", '.popup-registro-cuidador-paso1 .km-btn-popup-registro-cuidador-paso1', function ( e ) {
		e.preventDefault();

		$(".popup-registro-cuidador-paso1").hide();
		$(".popup-registro-cuidador-paso2").fadeIn("fast");
	});
	$(document).on("click", '.popup-registro-cuidador-paso2 .km-btn-popup-registro-cuidador-paso2', function ( e ) {
		e.preventDefault();

		$(".popup-registro-cuidador-paso2").hide();
		$(".popup-registro-cuidador-paso3").fadeIn("fast");
	});
	$(document).on("click", '.popup-registro-cuidador-paso3 .km-btn-popup-registro-cuidador-paso3', function ( e ) {
		e.preventDefault();

		$(".popup-registro-cuidador-paso3").hide();
		$(".popup-registro-exitoso-final").fadeIn("fast");
	});
	// POPUP REGISTRO CUIDADOR

	// FIN POPUP REGISTRO CUIDADOR

	$(document).on("click", '.km-caja-resultados .km-columna-der .closeMap', function ( e ) {
		e.preventDefault();

		$(this).parent().parent().fadeOut("fast");
	});

	$(document).on("click", '.btnOpenPopupMap', function ( e ) {
		e.preventDefault();

		$(".km-caja-resultados .km-columna-der").fadeIn("fast");

		google.maps.event.trigger(map, 'resize');
	});
});
