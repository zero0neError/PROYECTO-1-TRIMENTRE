<?php
/*
    Este bloque se encarga de recibir de la base de datos
    el array con tematicas y su id y el php se encarga
    de hacer el JSON que luego ajax recogera
*/
    include_once "BD.php";
    include_once "JSON.php";
    if(BD::conectar()){

        if(!BD::traeTematicas()==false){

            return creaJson($a);
        }
        
    }
?>