<?php
/**
 * Se hace la identidad de tamaño de las cosas para poder transportar de manera sencilla la informacion
 *
 * @author David Salas
 */

class tamanio {
    
    private $tamanoid;
    private $tamanonombre;
    private $tamanoestado;
    
   
    public function tamanio($tamanoid, $tamanonombre,$tamanoestado) {
        $this->tamanoid = $tamanoid;
        $this->tamanonombre = $tamanonombre;
        $this->tamanoestado=$tamanoestado;
        
    }

    public function getTamanoId() {
        return $this->tamanoid;
    }

    public function getTamanoNombre() {
        return $this->tamanonombre;
    }
    public function getTamanoEstado(){
        return $this->tamanoestado;
    }
    public function setTamanoId($tamanoid) {
        $this->tamanoid = $tamanoid;
    }

    public function setTamanoNombre($tamanonombre) {
        $this->tamanonombre = $tamanonombre;
    }
    
    public function setTamanoEstado($tamanoestado){
        $this->tamanoestado=$tamanoestado;
    }
    
}
?>