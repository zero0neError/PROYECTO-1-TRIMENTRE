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
        echo "
        <p id='titulo'>Alta Usuario</p>
        <form action='' id='form1'>
            <p>Email<input type='text' name='txtEmail' id='' placeholder='xxxx@gmail.com'></p>
            
            <p>Nombre<input type='text' name='txtName' id='' placeholder='Julian'></p>
            
            <p>Apellidos<input type='text' name='txtLastName' id='' placeholder='Rueda Padilla'></p>
            
            <p>Contraseña<input type='text' name='txtPassword' id='' placeholder='1234'></p>
            
            <p>Confirmar contraseña<input type='text' name='txtPassword2' id='' placeholder='1234'></p>
            
            <p>Fecha Nacimiento<input type='date' name='txtDate' id='' placeholder='15/12/2001'></p>
            
            <input type='submit' value='Aceptar'>
        </form>
        ";
    ?>
</body>
</html>