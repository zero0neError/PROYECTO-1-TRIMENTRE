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
    include_once "../clases/Usuario.php";
    session_start();
    if(isset($_SESSION['usuario'])){
    
        if(isset($_POST['email'])){

            if(BD::conectar()){
                $vec = BD::traeUsuariosPorCorreo($_POST['email']);
                var_dump($vec);
                //para que no salfa undefined
                $txtCorreo="";
                $txtNombre="";
                $txtApellidos="";
                $txtContraseña="";
                $txtFecha="";
                $txtRol="";
                //en el caso de que no sean los pone bien
                $txtCorreo=$vec[0]->email;
                $txtNombre=$vec[0]->nombre;
                $txtApellidos=$vec[0]->apellidos;
                $txtContraseña=$vec[0]->password;
                $txtFecha=$vec[0]->fechaNacimiento;
                $txtRol=$vec[0]->rol;

                printf ("<form action='' method='post'>
                <p>Correo:</p>
                <input type='text' name='txtCorreo' value='%s'>
                <p>Nombre:</p>
                <input type='text' name='txtNombre' value='%s'>
                <p>Apellidos:</p>
                <input type='text' name='txtApellidos' value='%s'>
                <p>Contraseña:</p>
                <input type='text' name='txtContraseña' value='%s'>
                <p>Fecha de Nacimiento:</p>
                <input type='text' name='txtFecha' value='%s'>
                <p>Rol:</p>
                <input type='text' name='txtRol' value='%s'>
                <input type='submit' name='btnBorrar' value='Borrar'>
                <input type='submit' name='btnGuardar' value='Guardar'>
                </form>",$txtCorreo,$txtNombre,$txtApellidos,$txtContraseña,$txtFecha,$txtRol);

                if(isset($_POST['btnBorrar']) && $_POST['txtCorreo']!=""){

                    if(BD::existeCorreo($_POST['email'])){

                        if(BD::borraUsuario($_POST['email'])==1){

                            echo "<p class='non-error'>Usuario borrado correctamente</p>";
                        }else{

                            echo "<p class='error'>Hubo un problema al borrar el ususario</p>";
                        }
                    }else{

                        echo "<p class='error'>No existe usuario con este correo</p>";
                    }
                }

                if(isset($_POST['btnGuardar']) && $_POST['txtCorreo']!=""){

                    if(BD::existeCorreo($_POST['email'])){

                        $usuario=new Usuario($_POST['txtCorreo'],$_POST['txtNombre'],$_POST['txtApellidos'],"",$_POST['txtFecha'], $_POST['txtRol'],"");
                    }else{

                        echo "<p class='error'>No existe usuario con este correo</p>";
                    }
                }
            }

        }else{

            echo "<p class='error'></p>";
        }
    }
?>

</body>
</html>