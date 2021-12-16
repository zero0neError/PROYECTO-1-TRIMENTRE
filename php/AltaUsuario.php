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
        include_once "BD.php";
        include_once "../clases/MandaEmail.php";
        include_once "../clases/Usuario.php";
        

        session_start();
        if(isset($_SESSION['usuario'])){

            if(isset($_POST['Enviar'])){
            
                if(isset($_POST['txtEmail']) && isset($_POST['txtName']) && isset($_POST['txtLastName']) && isset($_POST['txtDate']) && isset($_POST['selectRol'])){
    
                    
                    if(BD::conectar()){
                        
                        if(!BD::existeCorreo($_POST['txtEmail'])){
                            
                            $usuario=new Usuario($_POST['txtEmail'],$_POST['txtName'],$_POST['txtLastName'],"",$_POST['txtDate'], $_POST['selectRol'],"");
    
                            try {
                                BD::insertUsuario($usuario);
                                $hash=md5($_POST['txtEmail']);
            
                                if(BD::introduceHash($_POST['txtEmail'],$hash)==1){
                                    
                                    MandaEmail($_POST['txtEmail'],"Cambiar contraseña","<p><h1>Hola ".$_POST['txtName'].", ".$_POST['txtLastName']."</h1></p><br><p>Establezca una contraseña para su cuenta</p><br><a href='http://localhost/PROYECTO_PRIMER_TRIMESTRE/php/ChangePassword.php?id=${hash}'>Pulsa para cambiar tu contraseña</a>",null);
                                }
                            } catch (\Throwable $th) {
                                echo "<p class='error'>Se ha producido un error al mandar el email</p>";
                            }
    
                        }else{
    
                            echo "<p class='error'>Ese correo ya esta en uso</p>";
                        }
                    }
    
                }else{
    
                    echo "<p class='error'>No dejes campos vacios</p>";
                }
    
            }
           
            include_once "header_menu.php";
        }else{
            header("Location: Login.php");
        }
    ?>
    
    <form action='AltaUsuario.php' id='form1' method="POST">

        <p>Email</p><input type='text' name='txtEmail' id='' placeholder='xxxx@gmail.com'><br>
            
        <p>Nombre</p><input type='text' name='txtName' id='' placeholder='Julian'><br>
            
        <p>Apellidos</p><input type='text' name='txtLastName' id='' placeholder='Rueda Padilla'><br>
            
        <p>Fecha Nacimiento</p><input type='date' name='txtDate' id='' placeholder='15/12/2001'><br>

        <p>Rol</p>
        <select name="selectRol" id="selectRol">
            <option value="Usuario">Usuario</option>
            <option value="Admin">Admin</option>
        </select><br>
            
        <input type='submit' name="Enviar" value='Aceptar'>
    </form>
    
</body>
</html>