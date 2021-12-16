<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Autoescuela los panchos</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("Location: Login.php");
        }else{

            include_once "header_menu.php";
        }
        
    ?>
    <img class="paginaprincipal-banner-img" src="../imagenes/favicon.png" alt="logo" height="400px">
</body>
</html>