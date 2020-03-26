<?php
require ('../PHPMAILER/PHPMailer.php');
require ('../PHPMAILER/SMTP.php');
require ('../PHPMAILER/Exception.php');
require ('../PHPMAILER/OAuth.php');

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();
/*
Enable SMTP debugging
0 = off (for production use)
1 = client messages
2 = client and server messages
*/
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "registrodigitalreda@gmail.com";
$mail->Password = "12345reda";
$mail->setFrom('registrodigitalreda@gmail.com', 'REDA');
$mail->addAddress('santyjimenz22@gmail.com', 'Estimado aprendiz');
$mail->Subject = 'REDA';
$mail->Body = "Cordial Saludo";
$mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
$mail->IsHTML(true);

if (!$mail->send())
{
	echo "Error al enviar el E-Mail: ".$mail->ErrorInfo;
}
else
{
	echo "E-Mail enviado";
}
?>