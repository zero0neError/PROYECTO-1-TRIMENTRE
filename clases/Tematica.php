<?php
Class Tematica{

    private $nombre;

    public function __construct($n){

        $this->nombre=$n;
    }

    public function setNombre($n){

        $this->nombre=$n;
    }

    public function getNombre(){

        return $this->nombre;
    }
}