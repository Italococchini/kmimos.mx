<?php 
$html .='
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Lato:700,900" rel="stylesheet">
	<style>
		body{
			background: #fff;
			color: #3a3a3a;
			font-weight: 900!important;
			font-family: "Lato", sans-serif;
		}
		section{clear: both;}

		strong{font-weight: 900;}
		.container-fluid{padding: 0px!important; margin: 0px!important;width:100%!important; background:#9c2a81!important;}
		.sp {margin-left: -10%;}
		#top-volaris{width: 45%;}
		#body-top{min-width: 500px; max-width: 500px; margin:auto auto;}
		#img-1{width:100%; margin-left: 0%; height: 284px;}
		#contenedor-1{background: #9c2a81!important; width: 100%; height: 283.5px; margin-top: 0px!important;}
		#p-contenedor-1{font-size: 14pt; color: #fff; text-align: right; margin-top: 0px!important; position: relative; right: 0%; padding-top:27px; padding-right:20px;}
		#btn-img{width: 55%; position: relative; margin-left: 85px; margin-top: 5%;}
		#h1-1{margin-bottom: 10px; font-size: 22pt; margin-top: 3%; margin-left: 35px;}
		#p-contenedor-2{font-size: 14pt; text-align: center; margin-bottom: 3%;}
		#h2-1{margin-bottom: 10px; font-size: 14pt; margin-top: 32%; margin-left: 15%;}
		#img-contenedor-2{width:70%;margin-bottom: 10%;margin-top: 5%;}
		#p2-contenedor-2{font-size: 10pt; text-align: center; margin-top: -6%; margin-bottom: 5%;}
		#h1-3{font-size: 17pt; margin-left: 5%;}
		#img-3-1{width: 70%; margin-bottom: 10px!important; margin-left: 60px!important;}
		#img-3-2{width: 70%; margin-bottom: 10px!important; margin-left: 30px!important;}
		#span-o{color: #a92382; font-size: 14pt; margin-left: 24px!important;}
		#p-contenedor-3-1{font-size: 13pt; text-align: center; margin-left: 70px!important;}
		#p-contenedor-3-2{font-size: 13pt; text-align: center; margin-top: 10px!important; margin-left: -20%;}
		#p-contenedor-4{font-size: 16pt;text-align: center;color: #000;}
		#logo{display: inline-block;text-align: right;margin: 10px;margin-left: 70%; width: 25%;}
		@media (min-width: 1280px){}
		@media (min-width: 766px) and (max-width: 999px){
			#body-top{min-width: 500px; max-width: 500px; margin:auto auto;}
			#img-1{width:100%; margin-left: 0%; height: 284px;}
			#contenedor-1{background: #9c2a81!important; width: 100%; height: 283.5px; margin-top: 0px!important;}
			#p-contenedor-1{font-size: 14pt; color: #fff; text-align: right; margin-top: 0px!important; position: relative; right: 0%; padding-top:27px; padding-right:20px;}
			#btn-img{width: 55%; position: relative; margin-left: 85px; margin-top: 0%;}
			#h1-1{margin-bottom: 10px; font-size: 18pt; margin-top: 3%; margin-left: 60px;}
			#p-contenedor-2{font-size: 13pt; text-align: center; margin-bottom: 3%;}
			#h2-1{margin-bottom: 10px; font-size: 14pt; margin-top: 32%; margin-left: 15%;}

		}
		@media (min-width: 581px) and (max-width: 765px){
			#body-top{min-width: 500px; max-width: 500px; margin:auto auto;}
			#img-1{width:100%; margin-left: 0%; height: 198px;}
			#contenedor-1{background: #9c2a81!important; width: 100%; height: 197.5px; margin-top: 0px!important;}
			#p-contenedor-1{font-size: 12pt; color: #fff; text-align: right; margin-top: 0px!important; position: relative; right: 0%; padding-top:27px; padding-right:20px;}
			#btn-img{width: 60%; position: relative; margin-left: 50px; margin-top: 5%;}
			#h1-1{margin-bottom: 10px; font-size: 15pt; margin-top: 3%; margin-left: 120px;}
			#p-contenedor-2{font-size: 12pt; text-align: center; margin-bottom: 3%;}
			#h2-1{margin-bottom: 10px; font-size: 11pt; margin-top: 25%; margin-left: 25%;}
			#img-contenedor-2{width:55%;margin-bottom: 10%; margin-top: 5%;}
			#p2-contenedor-2{font-size: 10pt; text-align: center; margin-top: -6%; margin-bottom: 5%; padding-bottom:8px;}
			#h1-3{font-size: 15pt; margin-top:5px; margin-left: 17%;}
			#img-3-1{width: 70%; margin-bottom: 10px!important; margin-left: 50px!important;}
			#img-3-2{width: 70%; margin-bottom: 10px!important; margin-left: 15px!important;}
			#p-contenedor-3-1{font-size: 10pt; text-align: center; margin-left: 35px!important;}
			#p-contenedor-3-2{font-size: 10pt; text-align: center; margin-top:0px;}
			#span-o{color: #a92382; font-size: 11pt; margin-left: 14px!important;}
			#p-contenedor-4{font-size: 10pt;text-align: center;color: #000;}
			#logo{display: inline-block;text-align: right;margin: 10px; margin-left: 70%; width: 25%;}
		}
		@media (min-width: 481px) and (max-width: 580px){
			#body-top{min-width: 500px; max-width: 580px; margin:auto auto;}
			#img-1{width:100%; margin-left: 0%; height: 198px;}
			#contenedor-1{background: #9c2a81!important; width: 100%; height: 197.5px; margin-top: 0px!important;}
			#p-contenedor-1{font-size: 12pt; color: #fff; text-align: right; margin-top: 0px!important; position: relative; right: 0%; padding-top:27px; padding-right:20px;}
			#btn-img{width: 60%; position: relative; margin-left: 50px; margin-top: 5%;}
			#h1-1{margin-bottom: 10px; font-size: 15pt; margin-top: 3%; margin-left: 120px;}
			#p-contenedor-2{font-size: 11pt; text-align: center; margin-bottom: 3%;}
			#h2-1{margin-bottom: 10px; font-size: 11pt; margin-top: 25%; margin-left: 25%;}
			#img-contenedor-2{width:55%;margin-bottom: 10%; margin-top: 5%;}
			#p2-contenedor-2{font-size: 10pt; text-align: center; margin-top: -6%; margin-bottom: 5%; padding-bottom:8px;}
			#h1-3{font-size: 15pt; margin-top:5px; margin-left: 17%;}
			#img-3-1{width: 70%; margin-bottom: 10px!important; margin-left: 50px!important;}
			#img-3-2{width: 70%; margin-bottom: 10px!important; margin-left: 15px!important;}
			#p-contenedor-3-1{font-size: 10pt; text-align: center; margin-left: 35px!important;}
			#p-contenedor-3-2{font-size: 10pt; text-align: center; margin-top:0px;}
			#span-o{color: #a92382; font-size: 11pt; margin-left: 14px!important;}
			#p-contenedor-4{font-size: 10pt;text-align: center;color: #000;}
			#logo{display: inline-block;text-align: right;margin: 10px; margin-left: 70%; width: 25%;}
		}
		@media (min-width: 381px) and (max-width: 480px){
			#body-top{min-width: 380px; max-width: 480px; margin:auto auto;}
			#img-1{width:100%; margin-left: 0%; height: 198px;}
			#contenedor-1{background: #9c2a81!important; width: 100%; height: 197.5px; margin-top: 0px!important;}
			#p-contenedor-1{font-size: 11pt; color: #fff; text-align: right; margin-top: 0px!important; position: relative; right: 0%; padding-top:27px; padding-right:20px;}
			#btn-img{width: 60%; position: relative; margin-left: 30px; margin-top: 10%;}
			#h1-1{margin-bottom: 10px; font-size: 15pt; margin-top: 3%; margin-left: 70px;}
			#p-contenedor-2{font-size: 10pt; text-align: center; margin-bottom: 3%;}
			#h2-1{margin-bottom: 10px; font-size: 11pt; margin-top: 40%; margin-left: 10%;}
			#img-contenedor-2{width:55%;margin-bottom: 10%; margin-top: 5%;}
			#p2-contenedor-2{font-size: 8pt; text-align: center; margin-top: -6%; margin-bottom: 5%; padding-bottom:8px;}
			#h1-3{font-size: 13pt; margin-top:5px; margin-left: 11%;}
			#img-3-1{width: 70%; margin-bottom: 10px!important; margin-left: 35px!important;}
			#img-3-2{width: 70%; margin-bottom: 10px!important; margin-left: 15px!important;}
			#p-contenedor-3-1{font-size: 8pt; text-align: center; margin-left: 35px!important;}
			#p-contenedor-3-2{font-size: 8pt; text-align: center; margin-top:0px;}
			#span-o{color: #a92382; font-size: 11pt; margin-left: 14px!important;}
			#p-contenedor-4{font-size: 10pt;text-align: center;color: #000;}
			#logo{display: inline-block;text-align: right;margin: 10px; margin-left: 70%; width: 25%;}
		}
		@media (min-width: 280px) and (max-width: 380px){
			#body-top{min-width: 280px; max-width: 380px; margin:auto auto;}
			#img-1{width:100%; margin-left: 0%; height: 198px;}
			#contenedor-1{background: #9c2a81!important; width: 100%; height: 197.5px; margin-top: 0px!important;}
			#p-contenedor-1{font-size: 10pt; color: #fff; text-align: right; margin-top: 0px!important; position: relative; right: 0%; padding-top:27px; padding-right:20px;}
			#btn-img{width: 60%; position: relative; margin-left: 30px; margin-top: 10%;}
			#h1-1{margin-bottom: 10px; font-size: 14pt; margin-top: 3%; margin-left: 39px;}
			#p-contenedor-2{font-size: 9pt; text-align: center; margin-bottom: 3%;}
			#h2-1{margin-bottom: 10px; font-size: 11pt; margin-top: 40%; margin-left: 10%;}
			#img-contenedor-2{width:70%;margin-bottom: 10%; margin-top: 5%;}
			#p2-contenedor-2{font-size: 7pt; text-align: center; margin-top: -6%; margin-bottom: 5%; padding-bottom:8px;}
			#h1-3{font-size: 12pt; margin-top:5px; margin-left: 5%;}
			#img-3-1{width: 70%; margin-bottom: 10px!important; margin-left: 35px!important;}
			#img-3-2{width: 70%; margin-bottom: 10px!important; margin-left: 15px!important;}
			#p-contenedor-3-1{font-size: 8pt; text-align: center; margin-left: 35px!important;}
			#p-contenedor-3-2{font-size: 8pt; text-align: center; margin-top:0px;}
			#span-o{color: #a92382; font-size: 11pt; margin-left: 14px!important;}
			#p-contenedor-4{font-size: 10pt;text-align: center;color: #000;}
			#logo{display: inline-block;text-align: right;margin: 10px; margin-left: 70%; width: 25%;}
		}
	</style>
</head>
<body id="body-top">
	<div style="background:#000; margin-top: 1px;">
    	<div style="padding-left: 0px; padding-right: 0px;">
    		<img id="top-volaris" src="http://kmimosmx.sytes.net/QA1/prueba_email/img/logo-top-volaris.jpg">
    	</div>
    	<div class="clearfix"></div>
	</div>
   	<div class="container-fluid">       		     		
		<div style="width: 50%; float: left;">
			<img src="http://kmimosmx.sytes.net/QA1/prueba_email/img/Image-1.jpg" id="img-1">
		</div>
			<div style="width: 50%; float: left;">
				<div id="contenedor-1">
    				<p id="p-contenedor-1">Viaja tranquilo <br> deja a tu perro seguro <br> en el hogar de una <br> verdadera familia</p>
    				
    				<a href="https://www.kmimos.com.mx/?wlabel=volaris">
    					<img src="http://kmimosmx.sytes.net/QA1/prueba_email/img/Button-2.jpg" alt="boton 1" id="btn-img"></a>
    			</div>
			</div>
	</div>			
	<section style="background: #fff; color: #000; font-weight: lighter; height: 75%;">
   	 	<article id="top-content" style="width:100%;">
			<h1 id="h1-1">
			    <span style="color: #a92382;">+1000</span> Cuidadores Certificados</h1>
			<p id="p-contenedor-2">Conoce Kmimos, una red de <span style="color: #a92382;">Cuidadores Certificados que <br> hospedan a tu mascota</span> en su hogar para que t&uacute; viajes tranquilo</p>
   	 	</article>
		<article style="width: 50%; float: left;">
			<h2 id="h2-1">Kmimos te ofrece:</h2>
		</article>
		<article style="width: 50%; float: left;">
			<div style="width:100%;">
				<div style="width: 50%; float: left; margin-left: -5%;">
					<img id="img-contenedor-2" src="http://kmimosmx.sytes.net/QA1/prueba_email/img/Icon-1.png">
				</div>
				<div style="width: 50%; float: left; font-size: 12pt; margin-left: -5%;">
					<p id="p2-contenedor-2">Cuidadores Certificados que pasaron por pruebas psicom&eacute;tricas <br> y de conocimiento veterinario</p>
				</div>
			</div>
			<div style="width: 100%; margin-top: 4%; float: left; margin-left: -5%;">
				<div style="width: 50%; float: left;">
					<img id="img-contenedor-2" src="http://kmimosmx.sytes.net/QA1/prueba_email/img/Icon-2.png" 
					style="margin-left: -5%;">
				</div>
				<div style="width: 50%; float: left; margin-top: 7%; margin-left: -5%;">
					<p id="p2-contenedor-2">Cobertura de serv&iacute;cios veterinarios durante toda su estad&iacute;a</p>
				</div>
			</div>
		</article>
	</section>
	<section style="background: #fff; color: #000; font-weight: lighter; height: 70%;">
		<h1 id="h1-3">¡Reserva con Kmimos al viaja con Volaris!</h1>
		<div style="width: 50%; float: left;">
			<img id="img-3-1" src="http://kmimosmx.sytes.net/QA1/prueba_email/img/Image-2.jpg">
		</div>
		<div style="width: 50%; float: left;">
			<img id="img-3-2" src="http://kmimosmx.sytes.net/QA1/prueba_email/img/Image-3.jpg">
		</div>
		<div style="width: 45%; float: left;">
			<p id="p-contenedor-3-1">D&eacute;jalo en tu ciudad <br> de origen
			</p>
		</div>
		<div style="width: 10%; float: left;">
			<span id="span-o">&Oacute;</span>
		</div>
		<div style="width: 45%; float: left;">
			<p id="p-contenedor-3-2">Que lo apapache un <br>cuidador en tu destino</p>
		</div>
	</section>
	<section style="background: #fff;color: #000;font-weight: lighter;height: 40%;">
		<div style="width: 100%;">
			<p id="p-contenedor-4"><span style="color: #a92382;">¡Aprovecha nuestras promociones de </span>noviembre y diciembre<span style="color: #a92382;">!</span></p>
			<p id="p-contenedor-4"><span style="color: #a92382;">¡Disfruta de tu viaje. Tu mejor amigo estar&aacute; en buenas manos!</span></p>
		</div>
		<div style="width: 100%;">
			<div style="width: 50%; float: left;">
				<a href="https://www.kmimos.com.mx/?wlabel=volaris"><img src="http://kmimosmx.sytes.net/QA1/prueba_email/img/Button-1.jpg" style="width: 70%;margin-bottom: 10%;margin-top: 8%;margin-left: 14%;"></a>
			</div>
			<div style="width: 50%; float: left;">
				<a href="https://www.kmimos.com.mx/?wlabel=volaris"><img src="http://kmimosmx.sytes.net/QA1/prueba_email/img/Button-2.jpg" style="width: 70%;margin-bottom: 10%;margin-top: 8%;margin-left: 14%;"></a>
			</div>
		</div>
	</section>
	<section style="background: black;color: #fff; width: 100%;">
		<div>
			<article>
				<!-- <img id="logo" src="kmimosmx.sytes.net/QA1/prueba_email/img/Logo-Kmimos.png"> -->
				<img id="logo" src="img/Logo-Kmimos.png">
			</article>
		</div>
	</section>
</body>
';
