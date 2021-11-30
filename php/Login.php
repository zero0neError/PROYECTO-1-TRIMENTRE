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
            require_once "../clases/Sesion.php";
            // require_once "../entidades/Usuario.php";
            if(BD::conectar()){

                if(BD::isUser($_POST['email'], $_POST['password'])){

                    echo "<h1>Es usuario</h1>";
                    Sesion::init();
                    Sesion::setSesion($_POST['email'],$_POST['email']);
                    Sesion::setSesion("usuario",$user);
                }
                
                // if($respuesta!=false){

                //     Sesion::init();
                //     $user=new Usuario();
                //     $user->sesion($_POST['email'],$_POST['email']);
                //     Sesion::setSesion("usuario",$user);
                //     var_dump($user);
                // }
            }
        }
    ?>
    <img src="../imagenes/pipo.jpg" alt="hamster">
    <form action="Login.php" method="post">
        <p>Email</p>
        <input type="text" name="email" placeholder="Introduce tu usuario">
        <p>Contraseña</p>
        <input type="password" name="password">
        <input type="submit" name="Enviar" value="Aceptar">  
        <a href="#">¿Has olvidado la contraseña?</a>
        <a href="#">Nueva Cuenta</a>
    </form>
    
    
</body>
</html>
