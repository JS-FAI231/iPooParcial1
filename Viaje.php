<?php

class Viaje{
    private $destino;
    private $hora_partida;
    private $hora_llegada;
    private $numero;
    private $importe;
    private $fecha;
    private $cant_asientos_totales;
    private $cant_asientos_disponibles;
    private $responsable;  //(Delegacion) Referencia a una instancia de la clase Responsable

    /**
     * Metodo constructor de la clase Viaje
     */
    public function __construct($unDestino,$unaHoraP,$unaHoraL,$unNumero,$unImporte,$unaFecha,$unaCantTotal,$unaCantDisp,$unResp){
        $this->destino=$unDestino;
        $this->hora_partida=$unaHoraP;
        $this->hora_llegada=$unaHoraL;
        $this->numero=$unNumero;
        $this->importe=$unImporte;
        $this->fecha=$unaFecha;
        $this->cant_asientos_totales=$unaCantTotal;
        $this->cant_asientos_disponibles=$unaCantDisp;
        $this->responsable=$unResp;
    }

    /**Metodos de acceso Setter */
    /**
     * @param string $unDestino
     */ 
    public function setDestino($unDestino){
        $this->destino = $unDestino;
    }

    /**
     * @param string $unaHora_partida
     */ 
    public function setHora_partida($unaHora_partida){
        $this->hora_partida = $unaHora_partida;
    }

    /**
     * @param string $unaHora_llegada
     */ 
    public function setHora_llegada($unaHora_llegada){
        $this->hora_llegada = $unaHora_llegada;
    }

    /**
     * @param string $unNumero
     */ 
    public function setNumero($unNumero){
        $this->numero = $unNumero;
    }

    /**
     * @param float $unImporte
     */ 
    public function setImporte($unImporte){
        $this->importe = $unImporte;
    }

    /**
     * @param string $unaFecha
     */
    public function setFecha($unaFecha){
        $this->fecha = $unaFecha;
    }

    /**
     * @param int $unaCant_asientos_totales
     */
    public function setCant_asientos_totales($unaCant_asientos_totales){
        $this->cant_asientos_totales = $unaCant_asientos_totales;
    }

   /**
     * @param int $unaCant_asientos_disponibles
     */
    public function setCant_asientos_disponibles($unaCant_asientos_disponibles){
        $this->cant_asientos_disponibles = $unaCant_asientos_disponibles;
    }

   /**
     * @param Responsable $unResponsable
     */
    public function setResponsable($unResponsable){
        $this->responsable = $unResponsable;
    }

    
    /**Metodos de acceso Getters */
    
    /**
     * @return string
     */ 
    public function getDestino(){
        return $this->destino;
    }

    /**
     * @return string
     */ 
    public function getHora_partida(){
        return $this->hora_partida;
    }

    /**
     * @return string
     */ 
    public function getHora_llegada(){
        return $this->hora_llegada;
    }

    /**
     * @return string
     */ 
    public function getNumero(){
        return $this->numero;
    }

    /**
     * @return float
     */ 
    public function getImporte(){
        return $this->importe;
    }

    /**
     * @return string
     */
    public function getFecha(){
        return $this->fecha;
    }

    /**
     * @return int
     */
    public function getCant_asientos_totales(){
        return $this->cant_asientos_totales;
    }

   /**
     * @return int
     */
    public function getCant_asientos_disponibles(){
        return $this->cant_asientos_disponibles;
    }

   /**
     * @return Responsable
     */
    public function getResponsable(){
        return $this->responsable;
    }
    
     /**
     * Redefinicion del metodo __toString() que devuelve la informacion de los atributos
     * de la clase Viaje
     * @return string
     */
    public function __toString(){
        $d=$this->getDestino();
        $hp=$this->getHora_partida();
        $hl=$this->getHora_llegada();
        $num=$this->getNumero();
        $imp=$this->getImporte();
        $f=$this->getFecha();
        $at=$this->getCant_asientos_totales();
        $ad=$this->getCant_asientos_disponibles();
        $responsable=$this->getResponsable()->__toString();

        return ("Destino: ". $d." Fecha: ".$f." HoraPartida: ".$hp." HoraLlegada: ".$hl."\n".
                " Numero: ".$num." Importe: ".$imp."Asientos Disp: ".$ad."Asientos Totales: ".$at."\n".
                " Responsable: ".$responsable."\n");
    }

    /**
     * Metodo que intenta asignar una cantidad de asientos disponibles enviada por parametro
     * y devuelve Verdadero en caso de concretarse la asignacion o Falso en caso contrario.
     * @param int $cantAsientos
     * @return boolean
     */
    public function asignarAsientosDisponibles($cantAsientos){
        $auxExito=false;
        $asientosDisponibles=$this->getCant_asientos_disponibles();

        if ($cantAsientos<=$asientosDisponibles){
            $nuevaCantAsientosDisp=$asientosDisponibles-$cantAsientos;
            $this->setCant_asientos_disponibles($nuevaCantAsientosDisp);
            $auxExito=true;
        }
        return $auxExito;
    }

    /**
     * Metodo auxiliar que devuelve la cantidad de asientos vendidos en este viaje.
     * @return int
     */
    public function asientosVendidos(){
        return ($this->getCant_asientos_totales()-$this->getCant_asientos_disponibles());
    }
}

?>