<?php
/**
 * Se hace la identidad de tamaño de las cosas para poder transportar de manera sencilla la informacion
 *
 * @author David Salas
 */

class tipo {
    
    private $tipoid;
    private $tiponombre;
    private $tipoestado;
    
   
    public function tamanio($tamanoid, $tamanonombre,$tipoestado) {
        $this->tipoid = $tipoid;
        $this->tiponombre = $tiponombre;
        $this->tipoestado = $tipoestado;
        
    }

    public function getTipoId() {
        return $this->tipoid;
    }

    public function getTipoNombre() {
        return $this->tiponombre;
    }
    public function getTipoEstado(){
        return $this->tipoestado;
    }
    public function setTipoId($tipoid) {
        $this->tipoid = $tipoid;
    }

    public function setTipoNombre($tiponombre) {
        $this->tiponombre = $tiponombre;
    }
    public funcion setTipoEstado($tipoestado){
        $this->tipoestado =$tipoestado;
    }
    
}
?>