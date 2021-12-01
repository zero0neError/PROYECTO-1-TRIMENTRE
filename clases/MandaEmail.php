<?php
use PHPMailer\PHPMailer\PHPMailer;
function MandaEmail($destino,$asunto,$mensaje){

    require "../libs/vendor/autoload.php";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug  = 4;                          
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";                 
    $mail->Host       = "smtp.gmail.com";    
    $mail->Port       = 587;                 

    $mail->Username   = "autosusmuertos@gmail.com"; 
    $mail->Password   = "954678123#";  
    $mail->SetFrom("autosusmuertos@gmail.com", "AutoTusMuertos");
    $mail->Subject=$asunto;
    // cuerpo
    //$mail->AddEmbeddedImage("../imagenes/pipo.jpg","foto");
    //$mail->MsgHTML('<h1>Titulo interesante<h1><br><img src="cid:foto">');
    $mail->AddAddress($destino);
    $mail->MsgHTML($mensaje);
    $resul = $mail->Send();
    if(!$resul) {
        echo "Error" . $mail->ErrorInfo;
    } else {
        echo "Enviado";
    }
}





















































