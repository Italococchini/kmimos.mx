<?php
$html = '
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">	
		<title>CLUB DE LAS PATITAS FELICES</title>
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
		<style>
	      body {
	        font-family: "Lato", sans-serif;
	      }
	    </style>
	</head>
	<body style="min-width: 600px; max-width: 600px; border:1px solid #ccc; margin:auto auto; font-size: 18px;	">
		<header style="clear:both;background:#881C9B;">
			<h1 style="margin:0px;padding:30px;text-align: center;color:#fff;">
				<span style="font-size: 44px;">¡UN REFERIDO TUYO,</span><br>
				<span style="font-size: 26px;">SE HA UNIDO AL CLUB!</span>
			</h1>
		</header>
		<section style="text-align: center;">
			<img src="'.$http.$_SERVER["HTTP_HOST"].'/landing/img/logo_patitas.png" alt="" width="25%">
			<div style="margin: auto; width: 70%; text-align: justify; padding=bottom:10px;color:#757575;">
				<h2>¡Felicidades!</h2>
				<p>Tu amigo  <span style="font-weight: bold; color:#00D8B5;">'. $name .'</span> ha completado su primera reservación, ahora otro perrhijo moverá su colita de felicidad, ¡y tú ganaste 150 $ MXP!</p>
				<p>Has que la familia se haga más grande, sigue compartiéndonos.</p>
				<span>Atentamente;</span><br><br>	
				<img src="'.$http.$_SERVER["HTTP_HOST"].'/landing/img/logo-kmimos_120x30.png" alt="">
			</div>
			<br>
			<div style="color:#fff;width: 70%; text-align: justify; padding:15px 60px 15px 60px; background:#881C9B; margin:auto;">
				<p>Recuerda que por cada uno de tus referidos que reserve una noche con kmimos, recibir&aacute;s $150 de regalo en reservaciones.</p>
			</div>
			 <img style="padding:0px; margin-bottom: -4px;" src="'.$http.$_SERVER["HTTP_HOST"].'/landing/img/pendiente-01.jpg" width="100%">
			<img style="padding:0px; margin-bottom: -4px;" src="'.$http.$_SERVER["HTTP_HOST"].'/landing/img/fondo-paisaje.jpg" width="100%">

			<div style="padding:20px;font-size: 22px; text-align: center;color:#fff; background: #00b190; ">
				<span>La mascota se hospeda en la propia casa de cuidadores certificados</span>
			</div>

		</section>
		<footer style="padding:40px;font-size: 22px; text-align: center;color:#fff; background: #00D8B5; ">
			<span>&iquest;YA CONOCES KMIMOS? Te invitamos</span>
			<span>a ingresar a www.kmimos.com.mx</span>
		</footer>
	</body>
	</html>';
