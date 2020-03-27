<?php


session_start();

$con=mysqli_connect("localhost","root","","reda");

$resultado = mysqli_query($con, "SELECT * FROM tbl_aprendiz a LEFT JOIN register r ON a.documento_aprendiz = r.documento_aprendiz WHERE r.documento_aprendiz IS NULL;");
$row = mysqli_fetch_array($resultado);
$num = mysqli_num_rows($resultado); 
$correo = $row['correo_aprendiz'];
$nombre = $row['nombre1_aprendiz'];
$apellido = $row['apellido1_aprendiz'];
$x = 0;
$fecha = date("Y/m/d");
while ($x < $num) {
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
	$mail->addAddress($correo, 'Estimado aprendiz');
	$mail->Subject = 'RECORDATORIO';
	$mail->Body = "Cordial Saludo <br /><br />Aprendiz "  .$nombre. " " .$apellido. "<br /><br /> Nuestro sistema registró su ausencia en la fecha ".$fecha.". Recuerde por favor enviar su excusa justificada al instructor ".$_SESSION['nombre_instructor'].".  <br /><br /> Buen día";
	$mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
	$mail->IsHTML(true);
	
	if (!$mail->send())
	{
		echo "Error al enviar el E-Mail: ".$mail->ErrorInfo;
		header ('location: ../system.php');
	}
	else
	{
		header ('location: ../system.php');
	}
    $x += 1;
}


?>