<?php

    class Empresa{

    private $identificacion;
    private $nombre;
    private $colViajes;
    
    /**
     * Metodo constructor de la clase Empresa
     */
    public function __construct($unaIdentificacion,$unNombre,$unaColViajes){
        $this->identificacion=$unaIdentificacion;
        $this->nombre=$unNombre;
        $this->colViajes=$unaColViajes;
    }

    /**
     * Setter de la clase Empresa
     */
    /**
     * @param string $unaIdentificacion
     */
    public function setIdentificacion($unaIdentificacion){
        $this->identificacion=$unaIdentificacion;
    }
    /**
     * @param string $unNombre
     */
    public function setNombre($unNombre){
        $this->nombre=$unNombre;
    }
    /**
     * @param array $unaColViajes
     */
    public function setColViajes($unaColViajes){
        $this->colViajes=$unaColViajes;
    }

    /**
     * Getters de la clase Empresa
     */
    /**
     * @return string
     */
    public function getIdentificacion(){
        return $this->identificacion;
    }
    /**
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }
    /**
     * @return array
     */
    public function getColViajes(){
        return $this->colViajes;
    }

    /**
     * Redefinicion del metodo __toString() que devuelve la informacion de los atributos
     * de la clase Empresa
     * @return string
     */
    public function __toString(){
        $i=$this->getIdentificacion();
        $n=$this->getNombre();
        $infoViajes="";

        $arr_Viajes=$this->getColViajes();
        foreach ($arr_Viajes as $objViaje){
            $infoViajes=$infoViajes.($objViaje->__toString());
        }
        
        return ("Empresa Id: ".$i." Nombre: ".$n."\n"."Viajes: ".$infoViajes."\n");
    }

    /**
     * Metodo que intenta devolver los viajes disponibles dado un destino y cantidad de asientos
     * @param string $unDestino
     * @param int $unaCant
     * @return array 
     */
    
    public function darViajeADestino($unDestino,$unaCant){
        $arrDiponibilidad=[];
        $arr_Viajes=$this->getColViajes();
        foreach ($arr_Viajes as $objViaje){
            if($objViaje->getDestino()==$unDestino && $objViaje->getCant_asientos_disponibles()>=$unaCant){
                $nuevaPos=count($arrDiponibilidad);
                $arrDisponibilidad[$nuevaPos]=$objViaje;
            }
        }
        return $arrDisponibilidad;
    }

    /**
     * Metodo que intenta registrar un nuevo viaje.
     * No debe existir el mismo destino, fecha y hora de partida.
     * Retorna Verdadero en caso de ser agregado, falso en caso contrario.
     * 
     * @param Viaje $objNuevoViaje
     * @return boolean
     */
    public function incorporarViaje($objNuevoViaje){
        $exito=true;
        $encontrado=false;
        $arr_Viajes=$this->getColViajes();
        $cantViajes=count($arr_Viajes);
        $i=0;
        
        while ($i<$cantViajes && !$encontrado){
            $objViaje=$arr_Viajes[$i];
            if($objViaje->getDestino()==$objNuevoViaje->getDestino() && 
               $objViaje->getFecha()==$objNuevoViaje->getFecha() && 
               $objViaje->getHora_partida()==$objNuevoViaje->getHora_partida()){
                   //Ya existe un viaje con el mismo destino, fecha y hora de partida.
                   $encontrado=true;
                   $exito=false;
            }
            $i++;
        }

        //Si el viaje no exite en arr_Viajes lo agrego.
        if ($exito){
            $nuevaPos=count($arr_Viajes);
            $arr_Viajes[$nuevaPos]=$objNuevoViaje;
            $this->setColViajes($arr_Viajes);
        }
        
        return $exito;
    }

    /**
     * Metodo que intenta registrar la asignacion de un viaje dado una canAsientos y un Destino.
     * (uso del metodo asignarAsientosDisponibles)
     * Retorna una instancia del viaje asignado o null en caso contrario.
     * 
     * @param int $cantAsientos
     * @param string $destino
     * @return Viaje
     */
    public function venderViajeADestino($cantAsientos,$destino){
        $nuevoViaje=null;
        $encontrado=false;
        $arr_Viajes=$this->getColViajes();
        $cantViajes=count($arr_Viajes);
        $i=0;
        
        /**Busco el viaje */
        while ($i<$cantViajes && !$encontrado){
            $objViaje=$arr_Viajes[$i];
            if($objViaje->getDestino()==$destino){
                $encontrado=true;

                if ($objViaje->asignarAsientosDisponibles($cantAsientos)){
                    $nuevoViaje=$objViaje;
                }
            }
            $i++;
        }
        return $nuevoViaje;
    }

    /**
     * Metodo que intenta retornar el monto recaudado por la empresa en funcion de los asientos
     * vendidos y el importe del viaje.
     * @return float
     */
    public function montoRecaudado(){
        $venta=0;
        $arr_Viajes=$this->getColViajes();
        $cantViajes=count($arr_Viajes);
        for($i=0;$i<$cantViajes;$i++){
            $objViaje=$arr_Viajes[$i];
            $venta=$venta+($objViaje->getImporte()*$objViaje->asientosVendidos());
        }
        return $venta;
    }

    
}

?>