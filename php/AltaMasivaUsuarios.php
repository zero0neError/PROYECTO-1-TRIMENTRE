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
            include_once "../clases/Usuario.php";
            include_once "../clases/MandaEmail.php";
            include_once "../clases/AltaMasiva.php";
            include_once "BD.php";

            if(isset($_POST['Enviar'])){
                
                if($_POST['area']!=""){

                    AltaMasiva($_POST['area'],",");

                }

            }

        
        }else{
            header("Location: Login.php");
        }
            //         $area = $_POST['area'];
            //         $vector_usuario=array(); //array que contendra los valores individuales de cada usuario
            //         $vector_totales=array(); //array que contendra la filas del textarea
            //         $vector_objetos=array();//array los objetos usuario con sus datos ya introducidos
            //         $cont = 4;
            //         $vector_totales = explode("\n",$area);

            //         //##########################################
            //         // Aqui separamos cada fila por comas y metemos los valores en array_usuarios
            //         for($i=0;$i<count($vector_totales);$i++){

            //             $temp = explode(",",$vector_totales[$i]);
            //             for ($j=0; $j < count($temp); $j++) { 

            //                 array_push($vector_usuario,$temp[$j]);
            //             }
            //         }
            //         //##########################################
            //         // Aqui cogemos los 4 primeros valores que corresponden a un usuario, creamo el objeto y luego "borramos" los 4 utilizados para usar los 4 siguientes
            //         for ($i=0; $i < count($vector_usuario); $i++) { 
            //             $usuario = new Usuario($vector_usuario[2],$vector_usuario[0],$vector_usuario[1],null,null,$vector_usuario[3],null);
            //             array_push($vector_objetos,$usuario);
            //             $vector_usuario=array_splice($vector_usuario,$cont,count($vector_usuario));
            //             $cont=$cont+4;
            //         }
            //         //##########################################

            //         if(BD::conectar()){
                        
            //             for ($i=0; $i < count($vector_objetos); $i++) {

            //                 if(!BD::existeCorreo($vector_objetos[$i]->getEmail())==1){

            //                     if(BD::insertUsuario($vector_objetos[$i])==1){
            //                         $hash=md5($vector_objetos[$i]->getEmail());

            //                         if(BD::introduceHash($vector_objetos[$i]->getEmail(),$hash)==1){
            //                             MandaEmail($vector_objetos[$i]->getEmail(),"Cambiar contraseña","<a href='http://localhost/PROYECTO_PRIMER_TRIMESTRE/php/ChangePassword.php?id=${hash}'>Pulsa para cambiar tu contraseña</a>",null);
            //                         }    
            //                     }
            //                 }else{

            //                     echo "<p>El correo".$vector_objetos[$i]->getEmail()." ya existe</p>";
            //                 }
                            
            //             }
            //         }

            //     }else{

            //         echo "<p class='error'>No dejes campos vacios</p>";    
    
    ?>
    <form action="" method="post">
        <textarea name="area" id="area" cols="70" rows="20"></textarea>
        <input type="submit" value="Enviar" name="Enviar" placeholder="Name,LastName,Email,Rol"> 
    </form>
    

</body>
</html>