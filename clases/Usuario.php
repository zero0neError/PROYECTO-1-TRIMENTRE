<?php
Class Usuario{

    private $email;
    private $nombre;
    private $apellidos;
    private $password;
    private $fechaNacimiento;
    private $rol;
    private $foto;

    public function __construct($e,$n,$aps,$p,$fN,$r,$f){

        $this->email=$e;
        $this->nombre=$n;
        $this->apellidos=$aps;
        $this->password=$p;
        $this->fechaNacimiento=$fN;
        $this->rol=$r;
        $this->foto=$f;

    }

    public function sesion($correo){

        $this->email=$correo;
    }

    public function getEmail(){

        return $this->email;
    }

    public function getNombre(){

        return $this->nombre;
    }

    public function getApellidos(){

        return $this->apellidos;
    }

    public function getPassword(){

        return $this->password;
    }

    public function getFechaNacimiento(){

        return $this->fechaNacimiento;
    }

    public function getRol(){

        return $this->rol;
    }

    public function getFoto(){

        return $this->foto;
    }

}