<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/altaUsuario.css">
    <title>Document</title>
</head>
<body>
        <?php
        include_once "BD.php";
        if(isset($_POST['txtEmail']) && isset($_POST['txtName']) && isset($_POST['txtLastName']) && isset($_POST['txtDate']) && isset($_POST['selectRol']) && isset($_POST['Enviar'])){

            if(BD::conectar()){

                if(!BD::existeCorreo($_POST['txtEmail'])){

                    
                }else{

                    echo "<p>Ese correo ya esta en uso</p>";
                }
            }
        }else{

            echo "<p>No dejes campos vacios</p>";
        }
       
        ?>
    <p id='titulo'>Alta Usuario</p>
        <form action='' id='form1'>
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