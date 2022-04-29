<?php

class Responsable{
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $email;
    private $telefono;
    
    /**
     * Metodo constructor de la clase Responsable
     */
    public function __construct($unNombre,$unApellido,$unDni,$unaDir,$unEmail,$unTelef){
        $this->nombre=$unNombre;
        $this->apellido=$unApellido;
        $this->dni=$unDni;
        $this->direccion=$unaDir;
        $this->email=$unEmail;
        $this->telefono=$unTelef;
    }
    
    /**
     * Setter de la clase Responsable
     */
    /**
     * @param string $unNombre
     */
    public function setNombre($unNombre){
        $this->nombre=$unNombre;
    }
    /**
     * @param string $unApellido
     */
    public function setApellido($unApellido){
        $this->apellido=$unApellido;
    }
    /**
     * @param string $unDni
     */
    public function setDni($unDni){
        $this->dni=$unDni;
    }
    /**
     * @param string $unaDir
     */
    public function setDireccion($unaDir){
        $this->direccion=$unaDir;
    }
    /**
     * @param string $unEmail
     */
    public function setEmail($unEmail){
        $this->email=$unEmail;
    }/**
     * @param string $unTelef
     */
    public function setTelefono($unTelef){
        $this->telefono=$unTelef;
    }
   
    /**
     * @return string
     */
    public function getNombre(){
        return($this->nombre);
    }
    /**
     * @return string
     */
    public function getApellido(){
        return($this->apellido);
    }
    /**
     * @return string
     */
    public function getDni(){
        return($this->dni);
    }
    /**
     * @return string
     */
    public function getDireccion(){
        return($this->direccion);
    }
    /**
     * @return string
     */
    public function getEmail(){
        return($this->email);
    }
    /**
     * @return string
     */
    public function getTelefono(){
        return($this->telefono);
    }
    
    /**
     * Redefinicion del metodo __toString() que devuelve la informacion de los atributos
     * de la clase Responsable
     * @return string
     */
    public function __toString(){
        $n=$this->getNombre();
        $a=$this->getApellido();
        $d=$this->getDni();
        $dir=$this->getDireccion();
        $email=$this->getEmail();
        $tel=$this->getTelefono();
        return ("Nombre: ". $n." ".$a." DNI: ".$d." Direcc: ".$dir." Email: ".$email."Telef: ".$tel."\n");
    }






}