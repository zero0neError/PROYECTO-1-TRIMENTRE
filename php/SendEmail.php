<?php
use PHPMailer\PHPMailer\PHPMailer;
function mandaEmail($destino,$asunto,$mensaje,$archivo){

    require "../libs/vendor/autoload.php";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug  = 0;                          
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";                 
    $mail->Host       = "smtp.gmail.com";    
    $mail->Port       = 587;                 
    // introducir usuario de google
    
    $mail->Username   = "autosusmuertos@gmail.com"; 
    $mail->Password   = "954678123#";
    $mail->Subject = $asunto;
    // introducir clave, esta mas abajo    
    $mail->SetFrom($mail->Username, $mail->Subject);
    // cuerpo
    //$mail->AddEmbeddedImage("../imagenes/pipo.jpg","foto");
    //$mail->MsgHTML('<h1>Titulo interesante<h1><br><img src="cid:foto">');
    $mail->MsgHTML($mensaje);
    // adjuntos
    //$mail->addAttachment("adjunto.txt");
    // destinatario
    $address = $destino;
    $mail->AddAddress($address, "Profesor");
    // enviar
    $resul = $mail->Send();
    if(!$resul) {
        echo "Error" . $mail->ErrorInfo;
    } else {
        echo "Enviado";
    }
}





















































