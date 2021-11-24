<?php
use PHPMailer\PHPMailer\PHPMailer;
require "../libs/vendor/autoload.php";
$mail = new PHPMailer();
$mail->IsSMTP();
// cambiar a 0 para no ver mensajes de error
$mail->SMTPDebug  = 2;                          
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "tls";                 
$mail->Host       = "smtp.gmail.com";    
$mail->Port       = 587;                 
// introducir usuario de google

$mail->Username   = "wwbhty@gmail.com"; 
$mail->Password   = "ZqWD0pJ|{x6J-=[}DLmc";
// introducir clave, esta mas abajo 
$mail->Subject = "JA JA NO, QUE HA PASAO";      
$mail->SetFrom($mail->Username, $mail->Subject);
// asunto

// cuerpo
$mail->MsgHTML('<h1>Titulo interesante<h1><br><img src="../imagenes/pipo.jpg">');
// adjuntos
//$mail->addAttachment("adjunto.txt");
// destinatario
$address = "jve@ieslasfuentezuelas.com";
$mail->AddAddress($address, "Profesor");
// enviar
$resul = $mail->Send();
if(!$resul) {
  echo "Error" . $mail->ErrorInfo;
} else {
  echo "Enviado";
}



















































