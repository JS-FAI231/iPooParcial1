<?php

class Terminal{
    private $denominacion;
    private $direccion;
    private $colEmpresas;
    
    /**
     * Metodo constructor de la clase Terminal
     */
    public function __construct($unaDenominacion,$unaDireccion,$unaColEmpresas){
        $this->denominacion=$unaDenominacion;
        $this->direccion=$unaDireccion;
        $this->colEmpresas=$unaColEmpresas;
    }

    /**
     * Setter de la clase Terminal
     */
    /**
     * @param string $unaDenominacion
     */
    public function setDenominacion($unaDenominacion){
        $this->denominacion=$unaDenominacion;
    }
    /**
     * @param string unaDireccion;
     */
    public function setDireccion($unaDireccion){
        $this->direccion=$unaDireccion;
    }
    /**
     * @param array $unaColEmpresas
     */
    public function setColEmpresas($unaColEmpresas){
        $this->colEmpresas=$unaColEmpresas;
    }

    /**
     * Getters de la clase Terminal
     */
    /**
     * @return string
     */
    public function getDenominacion(){
        return $this->denominacion;
    }
    /**
     * @return string
     */
    public function getDireccion(){
        return $this->direccion;
    }
    /**
     * @return array
     */
    public function getColEmpresas(){
        return $this->colEmpresas;
    }

    /**
     * Redefinicion del metodo __toString() que devuelve la informacion de los atributos
     * de la clase Empresa
     * @return string
     */
    public function __toString(){
        $denom=$this->getDenominacion();
        $direc=$this->getDireccion();
        $infoEmpresas="";

        $arr_Empresa=$this->getColEmpresas();
        foreach ($arr_Empresa as $objEmpresa){
            $infoEmpresas=$infoEmpresas.($objEmpresa->__toString());
        }
        
        return ("Terminal Denominacion: ".$denom." Direccion: ".$direc."\n"."Empresas: ".$infoEmpresas."\n");
    }


    /**
     * Metodo que intenta asignar una venta automatica dado una cantidad de asiento, fecha, destino y empresa.
     * @param int $cantAsientos
     * @param string $fecha
     * @param string $destino
     * @param string $empresa
     * 
     */
    public function ventaAutomatica($cantAsientos,$fecha,$destino,$empresa){
        $arr_Empresas=$this->getColEmpresas();
        $encontrada=false;
        $cantEmpresas=count($arr_Empresas);
        $i=0;
        while ($i<$cantEmpresas && !$encontrada){
            $objEmpresa=$arr_Empresas[$i];
            if ($objEmpresa->getNombre()==$empresa){
                $objEmpresa->venderViajeADestino($cantAsientos,$destino);
            }
            $i++;
        }

    }

    /**
     * Metodo que retorna una instancia de Empresa que tiene mayor recaudacion
     * @return Empresa
     */
    public function empresaMayorRecaudacion(){
        $arr_Empresas=$this->getColEmpresas();
        $auxMayor=0;
        $auxEmpresa=null;
        foreach ($arr_Empresas as $objEmpresa){
            $montoRec=$objEmpresa->montoRecaudado();
            if($montoRec>=$auxMayor){
                $auxMayor=$montoRec;
                $auxEmpresa=$objEmpresa;
            }
        }
        return $auxEmpresa;
    }
    
    /**
     * Metodo que retorna al responsable de un viaje dado el numero de viaje.
     * @param int $numero
     * @return Responsable
     */
    public function responsableViaje($numero){
        $responsable=null;
        $arr_Empresas=$this->getColEmpresas();
        $encontrada=false;
        $cantEmpresas=count($arr_Empresas);
        $i=0;
        while ($i<$cantEmpresas && !$encontrada){
            $objEmpresa=$arr_Empresas[$i];
            
            $arr_Viajes=$objEmpresa->getColViajes();
            $cantViajes=count($arr_Viajes);
            $j=0;
            while($j<$cantViajes && !$encontrada){
                $objViaje=$arr_Viajes[$j];
                if($objViaje->getNumero()==$numero){
                    $responsable=$objViaje->getResponsable();
                    $encontrada=true;
                }
                $j++;
            }
            $i++;
        }
        return $responsable;
    }
}
?>