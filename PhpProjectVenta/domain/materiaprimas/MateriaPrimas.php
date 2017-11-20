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
    private $materiaprimacodigo;
    private $materiaprimaultimacompra;
   

    public function MateriasPrimas($materiaprimaid,$materiaprimacodigo, $materiaprimanombre, $materiaprimaprecio, $materiaprimacantidad, $materiaprimatipoid) {
        $this->materiaprimaid = $materiaprimaid;
        $this->materiaprimacodigo = $materiaprimacodigo;
        $this->materiaprimanombre = $materiaprimanombre;
        $this->materiaprimaprecio = $materiaprimaprecio;
        $this->materiaprimacantidad = $materiaprimacantidad;
        $this->materiaprimatipoid = $materiaprimatipoid;
        $this->materiaprimaultimacompra=null;
    }

    public function getMateriaPrimaUltimaCompra(){
        return $this->materiaprimaultimacompra;
    }
    public function getMateriaprimaid() {
        return $this->materiaprimaid;
    }

    public function getMateriaprimacodigo(){
        return $this->materiaprimacodigo;
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

    public function setMateriaPrimaUltimaCompra($materiaprimaultimacompra){
        $this->materiaprimaultimacompra=$materiaprimaultimacompra;
    }
    public function setMateriaprimaid($materiaprimaid) {
        $this->materiaprimaid = $materiaprimaid;
    }

    public function setMateriaprimacodigo($materiaprimacodigo){
        $this->materiaprimacodigo = $materiaprimacodigo;
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
