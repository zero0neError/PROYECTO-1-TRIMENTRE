<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
</head>
<body>
    <?php
        if(isset($_POST['Enviar']) && $_POST['correo']!=""){

            include_once "../php/BD.php";
            include_once "../clases/MandaEmail.php";
            if(BD::conectar()){

                if(BD::existeCorreo($_POST['correo'])){

                    $hash=md5($_POST['correo']);
                    if(BD::introduceHash($_POST['correo'],$hash)==1){
                        MandaEmail($_POST['correo'],"Cambiar contraseña","<a href='http://localhost/PROYECTO_PRIMER_TRIMESTRE/php/ChangePassword.php?id=${hash}'>Pulsa para cambiar tu contraseña</a>",null);
                    }    
                                        
                }else{

                    echo "<p>Correo introducido no existe</p>";
                }
            }
            
        }
    ?>
    
    <form action="enviaCorreo.php" method="post">
        <p>Introduce tu direccion de email</p>
        <input type="text" name="correo" id="correo"><br>
        <input type="submit" value="Enviar" name="Enviar">
    </form>
    
</body>
</html>