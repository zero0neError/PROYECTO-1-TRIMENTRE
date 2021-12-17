<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "header_menu.php";
        include_once "BD.php";
        session_start();
        if(isset($_SESSION['usuario'])){

            if(isset($_POST['enviar'])){

                if($_POST['email']!=""){

                    if(BD::conectar()){

                        if(BD::existeCorreo($_POST['email'])){
    
                            if(BD::borraUsuario($_POST['email'])==1){

                                echo "<p class='non-error'>Usuario borrado correctamente</p>";
                            }else{

                                echo "<p class='error'>Hubo un problema al borrar el ususario</p>";
                            }
                        }else{
    
                            echo "<p class='error'>No existe ese correo</p>";
                        }
                    }

                }else{

                    echo "<p class='error'>No dejes campos vacios</p>";
                }

                
            }
        }else{

            header("Location: Login.php");
        }
    ?>
    <section>
        <form action="" method="post">
            <p>Email:</p>
            <input type="text" name="email">
            <input type="submit" name="enviar" value="Consultar">
        </form>
    </section>
</body>
</html>