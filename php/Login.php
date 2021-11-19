<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <?php
        if(isset($_POST['Enviar']) && $_POST['email']!=""){
            
            require_once "libs/BD.php";
            require_once "libs/Sesion.php";
            require_once "libs/Usuario.php";
            if(BD::Conectar()){

                $respuesta = BD::isUser($users,$_POST['email'],$_POST['email'], $_POST['password']);

                if($respuesta!=false){

                    Sesion::init();
                    $user=new Usuario();
                    $user->sesion($_POST['email'],$_POST['email']);
                    Sesion::setSesion("usuario",$user);
        
                }
            }
        }
    ?>
    <form action="" method="post">
        <p>Usuario/email</p>
        <input type="text" name="email" placeholder="Introduce tu usuario">
        <p>Contraseña</p>
        <input type="password" name="password">
        <p><input type="submit" name="Enviar" value="Aceptar"></p>
    </form>
    
</body>
</html>
