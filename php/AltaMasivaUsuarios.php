<?php
    session_start();
    if(isset($_SESSION['usuario'])){

        include_once "header_menu.php";
    }else{
        header("Location: Login.php");
    }
    
?>
