<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Autoescuela los panchos</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("Location: Login.php");
        }else{

            
        }

    ?>
    <header>

    <img src="../imagenes/favicon.png" alt="logo">
    <h1 class="nombreAutoescuela">AUTOESCUELA LOS PANCHOS</h1>

    </header>
    <nav class='menu-desplegable'>
        <ul>
            <li><a href='#'>Usuarios</a>
                <ul>
                    <li><a href='#'>Alta de usuario</a></li>
                    <li><a href='#'>Alta masiva</a></li>
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
                    <li><a href='#'>Alta pregunta</a></li>
                    <li><a href='#'>Alta masiva</a></li>
                </ul>
            </li>
            <li><a href='#'>Examenes</a>
                <ul>
                    <li><a href='#'>Nuevo examen</a></li>
                    <li><a href='#'>Historico</a></li>
                </ul>
            </li>  
        </ul>
    </nav>
</body>
</html>