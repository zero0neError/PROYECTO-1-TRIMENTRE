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
            
            require_once "BD.php";
            require_once "../libs/Sesion.php";
            require_once "../entidades/Usuario.php";
            if(BD::Conectar()){

                $respuesta = BD::isUser($users,$_POST['email'], $_POST['password']);

                if($respuesta!=false){

                    Sesion::init();
                    $user=new Usuario();
                    $user->sesion($_POST['email'],$_POST['email']);
                    Sesion::setSesion("usuario",$user);
                    var_dump($user);
                }
            }
        }
    ?>
    <img src="../imagenes/pipo.jpg" alt="hamster">
    <form action="" method="post">
        <p>Usuario/email</p>
        <input type="text" name="email" placeholder="Introduce tu usuario">
        <p>Contraseña</p>
        <input type="password" name="password">
        <input type="submit" name="Enviar" value="Aceptar">  
        <a href="#">¿Has olvidado la contraseña?</a>
    </form>
    
    
</body>
</html>
