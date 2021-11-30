<?php
Class BD{

    private static $conexion;


    public static function conectar(){
        try {
            self::$conexion = new PDO("mysql:host=localhost;dbname=autoescuela", 'root', '');
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }

    public static function getConexion(){

        return self::$conexion;
    }
    // TODO Hacer un metodo versatil q le pases la tabla que quieres insertar y un array con los parametros de la tabla que quieres insertar, y el solo te coja la contidad de elementos del array y asi puedas poner tantas interrogaciones como elementos en la consulta
    public static function insertarFila($BD,$tabla,$array){

        //BLOQUE1________ESTE BLOQUE SE ENCARGA DE LEER EL NOMBRE DE LAS COLUMNAS DE UNA TABLA
        $numeroColumas=0;
        $nombresColumnas=array();
        $sql="select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = '.$BD.' and TABLE_NAME = '$tabla'";
        $result = self::$conexion->query($sql);
        while($registro = $result->fetch()){
            ++$numeroColumas;
        }
        
        //____________BLOQUE1

        //BLOQUE2________Se encarga de añadir las interrograciones dependiendo del numeroColumnas
        $sql="INSERT INTO $tabla values (".str_repeat("?,",$numeroColumas);
        $sql_final=substr($sql,0,(strlen($sql)-1)).")";
        $consulta = self::$conexion->prepare($sql_final);
        $cont=0;
        // for($i=0;$i<count($array);$i++){
        //     $consulta->bindParam($cont++,$array[$i]);
        //     echo $cont;
        // }
        $a="null";
        $b="pene";
        $c="eureka";
        $d="NOW()";
        $e="null";
        $consulta->bindParam(1,$a);
        $consulta->bindParam(2,$b);
        $consulta->bindParam(3,$c);
        $consulta->bindParam(4,$d);
        $consulta->bindParam(5,$e);
        
        if(!$consulta->execute()){

            echo "false";
        }

        //____________BLOQUE2
    }

    public static function insertaFilaMensaje($usuario,$mensaje,$img){
        $sql="INSERT INTO mensaje (Usuario, Mensaje, Hora) values (?,?,NOW(),?)";
        $consulta = self::$conexion->prepare($sql);
        $consulta->bindParam(1,$usuario);
        $consulta->bindParam(2,$mensaje);
        $consulta->bindParam(3,$img);

        if($consulta->execute()){
            return true;
        }else{
            return false;
        }

    }

    public static function isUser($email,$contraseña){
        $sql="select * from usuario where email like '${email}' AND password like '${contraseña}'";
        $consulta=self::$conexion->query($sql);
        $count = $consulta->rowCount();
        return $count==1;
    }

    public static function listadoContenidoTabla($tabla){

        $arr=array();
        $result = self::$conexion->query("SELECT * FROM '$tabla'");

        while($registro = $result->fetch(PDO::FETCH_OBJ)){

            array_push($arr, $registro);
        }

        return $arr;

    }

}


