<?php
    include_once "../clases/Sesion.php";
    include_once "BD.php";
    echo "<script>
        if(localStorage.getItem('id')!=''){
            const ajax = new XMLHttpRequest();
            ajax.open("POST", changePassword.php);
            ajax.send(?id=localStorage.getItem('id'));
        }
    </script>";
    //Comprueba si el usuario esta logeado, aqui no tiene sentido porque no hace falta estar logeado para estar aqui, pero si hace falta que se haya accedido desde la venta de usuario  
    if(isset($_GET['id']) && $_GET['id']!=""){
        echo "<script>
                localStorage.setItem('id',$_GET['id']);
            </script>";
        if(isset($_POST['Enviar']) && $_POST['password']!="" && $_POST['repeatPassword']!=""){
            $pass1=$_POST['password'];
            $pass2=$_POST['repeatPassword'];

            if($pass1==$pass2){

                if(BD::updatePassword($_GET['id'],$pass1)==1){

                    BD::resetHash($hash);
                }
                
            }else{
                echo "<p>Las contraseñas no coinciden</p>";
            }
        }
        
    }else{
        echo "cambiaria la pagina";
         // header("Location: Login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/changePassword.css">

    <title>Cambiar contraseña</title>
</head>
<body>
    <form action="ChangePassword.pshp" method="post">
        <p>Introduce tu nueva contraseña</p>
        <input type="text" name="password" id="txtPassword">
        <p>Repite tu nueva contraseña</p>
        <input type="text" name="repeatPassword" id="txtRepeatPassword"><br>
        <input type="submit" name="Enviar" value="Cambiar contraseña">
    </form>
</body>
</html>

