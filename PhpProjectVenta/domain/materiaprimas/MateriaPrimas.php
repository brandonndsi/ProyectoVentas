<?php


/**
 * Description of MateriaPrima
 *
 * @author Juancho
 */
class MateriasPrimas {

    private $materiaprimaid;
    private $materiaprimanombre;
    private $materiaprimaprecio;
    private $materiaprimatipoid;
    private $materiaprimacantidad;
   

    public function MateriasPrimas($materiaprimaid, $materiaprimanombre, $materiaprimaprecio, $materiaprimatipoid, $materiaprimacantidad) {
        $this->materiaprimaid = $materiaprimaid;
        $this->materiaprimanombre = $materiaprimanombre;
        $this->materiaprimaprecio = $materiaprimaprecio;
        $this->materiaprimatipoid = $materiaprimatipoid;
        $this->materiaprimacantidad = $materiaprimacantidad;
    }

    public function getMateriaprimaid() {
        return $this->materiaprimaid;
    }

    public function getMateriaprimanombre() {
        return $this->materiaprimanombre;
    }

    public function getMateriaprimaprecio() {
        return $this->materiaprimaprecio;
    }

    public function getMateriaprimatipoid() {
        return $this->materiaprimatipoid;
    }
    
    public function getMateriaprimacantidad() {
        return $this->materiaprimacantidad;
    }

    public function setMateriaprimaid($materiaprimaid) {
        $this->materiaprimaid = $materiaprimaid;
    }

    public function setMateriaprimanombre($materiaprimanombre) {
        $this->materiaprimanombre = $materiaprimanombre;
    }

    public function setMateriaprimaprecio($materiaprimaprecio) {
        $this->materiaprimaprecio = $materiaprimaprecio;
    }

    public function setMateriaprimatipoid($materiaprimatipoid) {
        $this->materiaprimatipoid = $materiaprimatipoid;
    }
    
    public function setMateriaprimacantidad($materiaprimacantidad) {
        $this->materiaprimacantidad = $materiaprimacantidad;
    }

}
