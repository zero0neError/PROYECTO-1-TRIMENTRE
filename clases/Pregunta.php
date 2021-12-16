<?php
Class Pregunta{

    include_once "Tematica.php";
    private Tematica $tematica;
    private $enunciado;
    private $arrayOptions=array();
    private $respuestaCorrecta;
    private $recurso;
    

    public function __construct($t,$e,$aO,$rC,$r){

        $this->tematica->setNombre($t);
        $this->enunciado=$e;
        $this->arrayOptions=$aO;
        $this->respuestaCorrecta=$rC;
        $this->recurso=$r;
    }

    public function getTematica(){

        return $this->tematica;
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