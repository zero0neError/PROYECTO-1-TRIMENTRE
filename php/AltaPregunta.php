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
    <form action='' method='post'>
        <p>Tematica:</p>
        <select name='combo'>
            $bucle;
        </select>
        <p>Enunciado:</p>
        <textarea name='area' cols='20' rows='5'></textarea>
        <p>Opcion 1</p>
        <input type='text' name='op1'>
        <input type='radio' name='op1'>Correcta
        <p>Opcion 2</p>
        <input type='text' name='op2'>
        <input type='radio' name='op2'>Correcta
        <p>Opcion 3</p>
        <input type='text' name='op3'>
        <input type='radio' name='op3'>Correcta
        <p>Opcion 4</p>
        <input type='text' name='op4'>
        <input type='radio' name='op4'>Correcta
        <input type='submit' value='Aceptar'>
    </form>
</body>
</html>