<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // include_once "../clases/Sesion.php";
        // Sesion::init();
        // if(Sesion::existe("usuario")){
        
            include_once "BD.php";

            if(isset($_POST['Enviar'])){

                if(isset($_POST['txtDescTematica'])){

                    if(BD::conectar()){

                        if(!BD::existeTematica($_POST['txtDescTematica'])){

                            BD::insertarTematica($_POST['txtDescTematica']);

                        }else{

                            echo "<script>alert('Ya existe esa tematica')</script>";
                        }
                    }
                }
                else{

                    echo "<script>alert('No dejes vacios los campos')</script>";
                }
            }
        // }else{

        //     header("Location: Login.php");
        // }
    ?>

    <form action='' method='post'>
        <label>Descripcion</label>
        <input type='text' name='txtDescTematica' id='tematica'>
        <input type='submit' value='Enviar' name='Enviar'>
    </form>
    
</body>
</html>