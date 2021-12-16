<?php
include_once "Tematica.php";
Class Pregunta{

    
    private $nombreTematica;
    private $enunciado;
    private $arrayOptions=array();
    private $respuestaCorrecta;
    private $recurso;
    

    public function __construct($t,$e,$aO,$rC,$r){

        $this->nombreTematica=$t;
        $this->enunciado=$e;
        $this->arrayOptions=$aO;
        $this->respuestaCorrecta=$rC;
        $this->recurso=$r;
    }

    public function getTematica(){

        return $this->nombreTematica;
    }

    public function getEnunciado(){

        return $this->enunciado;
    }

    public function getArray(){

        return $this->arrayOptions;
    }

    public function getRespuestCorrecta(){

        return $this->respuestaCorrecta;
    }

    public function getRecurso(){

        return $this->recurso;
    }
}