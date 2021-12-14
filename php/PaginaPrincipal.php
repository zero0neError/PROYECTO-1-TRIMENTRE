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

        session_start();
        echo $_SESSION["usuario"];
        if(!isset($_SESSION["usuario"])){

            echo "aaaaa";
            //header("Location: Login.php");

        }

    ?>
                <img src='../imagenes/favicon.jpg' width=100px>
                <nav id='menu'>
                    <ul>
                        <li><a href='#'>Usuarios</a>
                        
                            <ul>
                                <li><a href='AltaUsuario.php'>Alta de usuario</li>
                                <li><a href=''>Alta masiva</li>
                            </ul>
                        </li>
                        
                        <li><a href='#'>Tematicas</a>
                        <!-- start menu desplegable -->
                            <ul>
                                <li><a href='AltaTematica.php'>Alta tematica</a></li>
                            </ul>
                        <!-- end menu desplegable -->
                        </li>
                        <li><a href='#'>Preguntas</a>
                            <ul>
                                <li><a href=''>Alta pregunta</li>
                                <li><a href=''>Alta masiva</li>
                            </ul>
                        </li>
                        <li>
                        <a href='#'>Examenes</a>
                            <ul>
                                <li><a href=''>Alta examen</li>
                                <li><a href=''>Historico</li>
                            </ul>
                        </li>  
                    </ul>
        </nav>
</body>
</html>