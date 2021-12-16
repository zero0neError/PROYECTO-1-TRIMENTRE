<?php

    function AltaMasiva($area,$separadorClave,$queAltaMasiva){

        include_once "Usuario.php";
        include_once "MandaEmail.php";
        include_once "../php/BD.php";

        $vector_separado_clave=array(); //array que contendra los valores individuales de cada usuario
        $vector_separado_lineas=array(); //array que contendra la filas del textarea
        $vector_objetos=array();//array los objetos usuario con sus datos ya introducidos
        $cont = 4;
        $vector_separado_lineas = explode("\n",$area);

        // Aqui separamos cada fila por comas y metemos los valores en array_usuarios
        for($i=0;$i<count($vector_separado_lineas);$i++){

            $temp = explode($separadorClave,$vector_separado_lineas[$i]);
            for ($j=0; $j < count($temp); $j++) { 

                array_push($vector_separado_clave,$temp[$j]);
            }
        }

        //##########################################
        //##########ALTA MASIVA DE USUARIOS#########
        //##########################################

        if($queAltaMasiva=="usuarios"){

            // Aqui cogemos los 4 primeros valores que corresponden a un usuario, creamo el objeto y luego "borramos" los 4 utilizados para usar los 4 siguientes
            for ($i=0; $i < count($vector_separado_clave); $i++) { 
                $usuario = new Usuario($vector_separado_clave[2],$vector_separado_clave[0],$vector_separado_clave[1],null,null,$vector_separado_clave[3],null);
                array_push($vector_objetos,$usuario);
                $vector_separado_clave=array_splice($vector_separado_clave,$cont,count($vector_separado_clave));
                $cont=$cont+4;
            }

            if(BD::conectar()){
                    
                for ($i=0; $i < count($vector_objetos); $i++) {

                    if(!BD::existeCorreo($vector_objetos[$i]->getEmail())==1){

                        if(BD::insertUsuario($vector_objetos[$i])==1){
                            $hash=md5($vector_objetos[$i]->getEmail());

                            if(BD::introduceHash($vector_objetos[$i]->getEmail(),$hash)==1){
                                MandaEmail($vector_objetos[$i]->getEmail(),"Cambiar contraseña","<a href='http://localhost/PROYECTO_PRIMER_TRIMESTRE/php/ChangePassword.php?id=${hash}'>Pulsa para cambiar tu contraseña</a>",null);
                            }    
                        }
                    }else{

                        echo "<p class='error'>El correo".$vector_objetos[$i]->getEmail()." ya existe</p>";
                    }
                        
                }
            }
        }

        //##########################################
        //##########ALTA MASIVA DE PREGUNTAS########
        //##########################################

        if($queAltaMasiva=="preguntas"){

            //Maniobras,¿Que se debe hacer cuando un vehiculo adelanta?,Apartarse,Bailar macarena,No hacer nada, Tomarse una caña,1

            for ($i=0; $i < count($vector_separado_clave); $i++) { 
                $pregunta = new Pregunta($vector_separado_clave[0],$vector_separado_clave[1],array($vector_separado_clave[2],$vector_separado_clave[3],$vector_separado_clave[4],$vector_separado_clave[5]),$vector_separado_clave[6],null);
                array_push($vector_objetos,$pregunta);
                $vector_separado_clave=array_splice($vector_separado_clave,$cont,count($vector_separado_clave));
                $cont=$cont+4;
            }

            if(BD::conectar()){
                    
                for ($i=0; $i < count($vector_objetos); $i++) {

                    if(!BD::existeTematica($vector_objetos[$i]->getTematica()->getNombre())==1){

                        if(BD::insertUsuario($vector_objetos[$i])==1){
                            $hash=md5($vector_objetos[$i]->getEmail());

                            if(BD::introduceHash($vector_objetos[$i]->getEmail(),$hash)==1){
                                MandaEmail($vector_objetos[$i]->getEmail(),"Cambiar contraseña","<a href='http://localhost/PROYECTO_PRIMER_TRIMESTRE/php/ChangePassword.php?id=${hash}'>Pulsa para cambiar tu contraseña</a>",null);
                            }    
                        }
                    }else{

                        echo "<p class='error'>No existe".$vector_objetos[$i]->getTematica()->getNombre()." en la base de datos</p>";
                    }
                        
                }
            }
        }


        
        
    }
?>