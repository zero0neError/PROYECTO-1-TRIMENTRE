<?php
include_once ("BD.php");
if(BD::conectar("foro")){

    BD::insertarFila("foro","mensaje",array("null","SynatxError","Esto es un mensaje","NOW()","null"));

}else{

    echo "<h1>Error al conectar con la base de datos</h1>";
}

