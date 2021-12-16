<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src=""></script>
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['usuario'])){

            include_once "header_menu.php";

        }else{

            header("Location: Login.php");
        }
    ?>
    <form action="" method="post">
        <p>Tematica:</p>
        <select name="combo">
            $bucle;
        </select>
        <p>Enunciado:</p>
        <textarea name="area" cols="20" rows="5"></textarea>
    </form>
</body>
</html>