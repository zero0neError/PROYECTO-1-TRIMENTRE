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