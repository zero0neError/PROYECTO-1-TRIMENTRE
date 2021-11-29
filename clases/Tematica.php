<?php
Class Tematica{

    private $nombre;

    public function __construct($n){

        $this->nombre=$n;
    }

    public function getNombreTematica(){

        return $this->nombre;
    }
}