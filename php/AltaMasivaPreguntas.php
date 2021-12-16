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

            include_once "header_menu.php";
            include_once "../clases/Pregunta.php";
            include_once "../clases/MandaEmail.php";
            include_once "../clases/AltaMasiva.php";
            include_once "BD.php";

            if(isset($_POST['Enviar'])){
                
                if($_POST['area']!=""){

                    AltaMasiva($_POST['area'],";","preguntas");

                }

            }

        
        }else{
            header("Location: Login.php");
        }
    
    ?>
    <form action="" method="post">
        <textarea name="area" id="area" cols="70" rows="20"></textarea>
        <input type="submit" value="Enviar" name="Enviar"> 
    </form>
    

</body>
</html>