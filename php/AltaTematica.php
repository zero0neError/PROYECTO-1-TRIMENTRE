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
        session_start();
        if(isset($_SESSION['usuario'])){
        
            include_once "BD.php";

            if(isset($_POST['Enviar'])){

                if(isset($_POST['txtDescTematica'])){

                    if(BD::conectar()){

                        if(!BD::existeTematica($_POST['txtDescTematica'])){

                            if(BD::insertarTematica($_POST['txtDescTematica'])==1){

                                echo "<p class='non-error'>Tematica insertada correctamente</p>";
                            }

                        }else{

                            echo "<p class='error'>Ya existe esa tematica</p>";
                        }
                    }
                }
                else{

                    echo "<p class='error'>No dejes vacios los campos</p>";
                }
            }
        }else{

            header("Location: Login.php");
        }

        include_once "header_menu.php";
    ?>

    <form action='' method='post'>
        <p>Descripcion</p>
        <input type='text' name='txtDescTematica' id='tematica'>
        <input type='submit' value='Enviar' name='Enviar'>
    </form>
    
</body>
</html>