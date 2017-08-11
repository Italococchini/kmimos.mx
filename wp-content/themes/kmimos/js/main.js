function playVideo(e) {
	var el = $(e);
	var p = el.parent().parent().parent();
	$('video', p).get(0).play();
	$('.km-testimonial-text').css('display','none');
	$('.img-testimoniales').css('display','none');
	$('video').css('display','block');

}

function menu(){
	var w = $(window).width();
	if($(this).scrollTop() > 10) {
		$('.bg-transparent').addClass('bg-white');
		$('.navbar-brand img').attr('src', HOME+'/images/new/km-logos/km-logo-negro.png');
		$('.navbar-toggle img').attr('src', HOME+'/images/new/km-navbar-mobile-negro.svg');
		$('.nav li a').css('padding','10px 15px 8px');
		$('.navbar-brand>img').css('height','40px');
		$('.nav li:first-child a').addClass('pd-tb11');
		$('.nav-login').addClass('dnone');
		$('.navbar').css('padding-top', '15px');
		if( w >= 768 ){
			$('a.km-nav-link, .nav-login li a').css('color','black');
		}
	} else {
		$('.bg-transparent').removeClass('bg-white');
		$('.navbar-brand img').attr('src', HOME+'/images/new/km-logos/km-logo.png');
		$('.navbar-toggle img').attr('src', HOME+'/images/new/km-navbar-mobile.svg');
		$('.nav li a').css('padding','19px 15px 15px');
		$('.navbar-brand>img').css('height','60px');
		$('.nav li:first-child a').removeClass('pd-tb11');
		$('.nav-login').removeClass('dnone');
		$('.navbar').css('padding-top', '30px');
		if( w >= 768 ){
			$('a.km-nav-link, .nav-login li a').css('color','white');
		}
	}
}

function mapStatic( e ){
	var w = $(e);
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

	if( pines != undefined ){
		if( pines.length > 1 ){
			mapStatic( this );
		}
	}
});

var fecha = new Date();
$(document).ready(function(){
	menu();

	jQuery(".datepick td").on("click", function(e){
		jQuery( this ).children("a").click();
	});

	function getCleanedString(cadena){
		var specialChars = "!@#$^&%*()+=-[]\/{}|:<>?,.";
		for (var i = 0; i < specialChars.length; i++) {
			cadena= cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
		}   
		cadena = cadena.toLowerCase();
		cadena = cadena.replace(/ /g," ");
		cadena = cadena.replace(/á/gi,"a");
		cadena = cadena.replace(/é/gi,"e");
		cadena = cadena.replace(/í/gi,"i");
		cadena = cadena.replace(/ó/gi,"o");
		cadena = cadena.replace(/ú/gi,"u");
		cadena = cadena.replace(/ñ/gi,"n");
		return cadena;
	}

	jQuery("#ubicacion_txt").on("keyup", function ( e ) {		
		var buscar_1 = getCleanedString( String(jQuery("#ubicacion_txt").val()).toLowerCase() );

		jQuery("#ubicacion_list div").css("display", "none");
		jQuery("#ubicacion_list div").each(function( index ) {
			if( String(jQuery( this ).attr("data-value")).toLowerCase().search(buscar_1) != -1 ){
				jQuery( this ).css("display", "block");
				if( index == 0 ){
					// jQuery("#ubicacion").val( jQuery( this ).html() );
					// jQuery("#ubicacion").attr( "data-value", jQuery( this ).attr("data-value") );
				}
			}
		});
	});

	jQuery("#ubicacion_txt").on("focus", function ( e ) {		
		var buscar_1 = getCleanedString( String(jQuery("#ubicacion_txt").val()).toLowerCase() );

		jQuery("#ubicacion_list div").css("display", "none");
		jQuery("#ubicacion_list div").each(function( index ) {
			if( String(jQuery( this ).attr("data-value")).toLowerCase().search(buscar_1) != -1 ){
				jQuery( this ).css("display", "block");
			}
		});
	});

	jQuery("#ubicacion_txt").on("change", function ( e ) {		
		var txt = getCleanedString( String(jQuery("#ubicacion_txt").val()).toLowerCase() );
		if( txt == "" ){
			jQuery("#ubicacion").val( "" );
			jQuery("#ubicacion").attr( "data-value", "" );
		}
	});

	$(window).scroll(function() {
		menu();
	});

	jQuery.post(
		HOME+"/procesos/busqueda/ubicacion.php",
		{},
		function(data){
			jQuery("#ubicacion_list").html(data);
			jQuery("#ubicacion_list div").on("click", function(e){
				jQuery("#ubicacion_txt").val( jQuery(this).html() );
				jQuery("#ubicacion").val( jQuery(this).attr("value") );
				jQuery("#ubicacion").attr( "data-value", jQuery(this).attr("data-value") );
			});
			jQuery("#ubicacion_txt").attr("readonly", false);
		}
	);

	$('.bxslider').bxSlider({
	  buildPager: function(slideIndex){
		switch(slideIndex){
		  case 0:
			return '<img src="'+HOME+'/images/new/km-testimoniales/thumbs/testimonial-1.jpg">';
		  case 1:
			return '<img src="'+HOME+'/images/new/km-testimoniales/thumbs/testimonial-2.jpg">';
		  case 2:
			return '<img src="'+HOME+'/images/new/km-testimoniales/thumbs/testimonial-3.jpg">';
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
        $(this).children("input:checkbox").prop("checked", !$(this).children("input").prop("checked"));
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

	function initCheckin(date, actual){
		if(actual){
			jQuery('#checkout').datepick({
				dateFormat: 'dd/mm/yyyy',
				defaultDate: date,
				selectDefaultDate: true,
				minDate: date,
				onSelect: function(xdate) {

				},
				yearRange: date.getFullYear()+':'+(parseInt(date.getFullYear())+1),
				firstDay: 1,
				onmonthsToShow: [1, 1]
			});
		}else{
			jQuery('#checkout').datepick({
				dateFormat: 'dd/mm/yyyy',
				minDate: date,
				onSelect: function(xdate) {

				},
				yearRange: date.getFullYear()+':'+(parseInt(date.getFullYear())+1),
				firstDay: 1,
				onmonthsToShow: [1, 1]
			});
		}
	}

	jQuery('#checkin').datepick({
		dateFormat: 'dd/mm/yyyy',
		minDate: fecha,
		onSelect: function(date1) {
			var ini = jQuery('#checkin').datepick( "getDate" );
			var fin = jQuery('#checkout').datepick( "getDate" );
			if( fin.length > 0 ){
				var xini = ini[0].getTime();
				var xfin = fin[0].getTime();
				if( xini > xfin ){
	            	jQuery('#checkout').datepick('destroy');
					initCheckin(date1[0], true);
	            }else{
	            	jQuery('#checkout').datepick('destroy');
					initCheckin(date1[0], false);
	            }
			}else{
				jQuery('#checkout').datepick('destroy');
				initCheckin(date1[0], true);
			}
		},
		yearRange: fecha.getFullYear()+':'+(parseInt(fecha.getFullYear())+1),
		firstDay: 1,
		onmonthsToShow: [1, 1]
	});

	jQuery('#checkout').datepick({
		dateFormat: 'dd/mm/yyyy',
		minDate: fecha,
		onSelect: function(xdate) {

		},
		yearRange: fecha.getFullYear()+':'+(parseInt(fecha.getFullYear())+1),
		firstDay: 1,
		onmonthsToShow: [1, 1]
	});

	$("#buscar").on("click", function ( e ) {
		e.preventDefault();
		$("#buscador").submit();
	});

	$("#buscar_no").on("click", function ( e ) {
		e.preventDefault();
		$("#buscador").submit();
	});


});
