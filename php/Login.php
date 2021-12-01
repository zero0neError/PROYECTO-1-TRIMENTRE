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
            require_once "../clases/Usuario.php";
            if(BD::conectar()){

                if(BD::isUser($_POST['email'], $_POST['password'])){

                    echo "<script>alert('Bienvenido')</script>";
                    Sesion::init();
                    Sesion::setSesion("usuario",$_POST['email']);
                }else{

                    echo "<script>alert('Email o contraseña incorrectos')</script>";
                }
            }
        }
    ?>
    <img src="../imagenes/pipo.jpg" height="350px" width="300px" alt="hamster">
    <form action="Login.php" method="post">
        <p>Email</p>
        <input type="text" name="email" placeholder="Introduce tu usuario">
        <p>Contraseña</p>
        <input type="password" name="password">
        <input type="submit" name="Enviar" value="Aceptar">  
        <a href="enviaCorreo.php">¿Has olvidado la contraseña?</a>
    </form>
    
    
</body>
</html>
