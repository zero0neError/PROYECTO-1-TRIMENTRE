<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menudesplegable.css">
    <title>Autoescuela los panchos</title>
</head>
<body>
    <?php

        // include_once "../clases/Sesion.php";
        // Sesion::init();
        // if(Sesion::existe("usuario")){

            echo "
                <img src='../imagenes/pipo.jpg' height='150px' width='1460px' alt='hamster'>
                <nav id='menu'>
                    <ul>
                        <li><a href='#'>Usuarios</a></li>
                        <li><a href='#'>Tematicas</a>
                        <!-- start menu desplegable -->
                            <ul>
                                <li><a href='AltaTematica.php'>Alta tematica</a></li>
                            </ul>
                        <!-- end menu desplegable -->
                        </li>
                        <li><a href='#'>Preguntas</a></li>
                        <li><a href='#'>Examenes</a></li>  
                    </ul>
                 </nav>";

        // }else{

        //     header("Location: Login.php");
        // }
        
    ?>
</body>
</html>