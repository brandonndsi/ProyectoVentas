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
    private $tipomateriaprimaid;
   

    public function MateriasPrimas($materiaprimaid, $materiaprimanombre, $materiaprimaprecio, $tipomateriaprimaid) {
        $this->materiaprimaid = $materiaprimaid;
        $this->materiaprimanombre = $materiaprimanombre;
        $this->materiaprimaprecio = $materiaprimaprecio;
        $this->tipomateriaprimaid = $tipomateriaprimaid;
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

    public function getTipomateriaprimaid() {
        return $this->tipomateriaprimaid;
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

    public function setTipomateriaprimaid($tipomateriaprimaid) {
        $this->tipomateriaprimaid = $tipomateriaprimaid;
    }

}
