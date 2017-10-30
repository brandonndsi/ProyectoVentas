<?php
/**
 * Se hace la identidad de tamaño de las cosas para poder transportar de manera sencilla la informacion
 *
 * @author David Salas
 */

class tamanio {
    
    private $tamanoid;
    private $tamanonombre;
    
   
    public function tamanio($tamanoid, $tamanonombre) {
        $this->tamanoid = $tamanoid;
        $this->tamanonombre = $tamanonombre;
        
    }

    public function getTamanoId() {
        return $this->tamanoid;
    }

    public function getTamanoNombre() {
        return $this->tamanonombre;
    }

    public function setTamanoId($tamanoid) {
        $this->tamanoid = $tamanoid;
    }

    public function setTamanoNombre($tamanonombre) {
        $this->tamanonombre = $tamanonombre;
    }
    
}
?>