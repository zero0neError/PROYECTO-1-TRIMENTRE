<?php
use PHPMailer\PHPMailer\PHPMailer;
function MandaEmail($destino,$asunto,$mensaje){

    require "../libs/vendor/autoload.php";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug  = 0;                          
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";                 
    $mail->Host       = "smtp.gmail.com";    
    $mail->Port       = 465;                 

    $mail->Username   = "autolospanchos@gmail.com"; 
    $mail->Password   = "954678123#";  
    $mail->SetFrom("autosusmuertos@gmail.com", "AutoLosPanchos");
    $mail->Subject=$asunto;
    // cuerpo
    //$mail->AddEmbeddedImage("../imagenes/pipo.jpg","foto");
    //$mail->MsgHTML('<h1>Titulo interesante<h1><br><img src="cid:foto">');
    $mail->AddAddress($destino);
    $mail->MsgHTML($mensaje);
    $resul = $mail->Send();
    if(!$resul) {
        echo "<p class='error'>Hubo un problema al enviar el email</p";
    } else {
        echo "<p class='non-error'>Email enviado correctamente</p>";
    }
}





















































