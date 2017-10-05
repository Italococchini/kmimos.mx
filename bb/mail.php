<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';
require 'phpmailer/SMTP.php';



//Create a new PHPMailer instance
$mail = new PHPMailer;
$mail->isSendmail();
$mail->setFrom('b.bros@kmimos.la', 'Blood Brothers | Kmimos');
$mail->addAddress($correo, $nombre.'-'.$apellido);
$mail->Subject = 'Suscripcion a Blood Brothers | Kmimos';
$mail->IsHTML(true);
$url_imagen = 'http://bookmediapublicidad.com/devs/kmimos/public_html/boletin.jpg';
$body = '<center><img src="'.$url_imagen.'"></center>';
$mail->Body = $body; // Mensaje a enviar
$envio1=0;
if ($mail->send()) {
    $envio1=1;
}
echo $envio1;
?>