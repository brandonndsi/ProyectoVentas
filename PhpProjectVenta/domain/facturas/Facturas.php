<?php

/**
 * Description of Factura
 *
 * @author Brandon
 */
class Facturas {

    private $facturaid;
    private $facturafecha;
    private $personaid;

    public function Facturas($facturaid, $facturafecha, $personaid) {
        $this->facturaid = $facturaid;
        $this->facturafecha = $facturafecha;
        $this->personaid = $personaid;
    }

    public function getFacturaid() {
        return $this->facturaid;
    }

    public function getFacturafecha() {
        return $this->facturafecha;
    }

    public function getPersonaid() {
        return $this->personaid;
    }

    public function setFacturaid($facturaid) {
        $this->facturaid = $facturaid;
    }

    public function setFacturafecha($facturafecha) {
        $this->facturafecha = $facturafecha;
    }

    public function setPersonaid($personaid) {
        $this->personaid = $personaid;
    }

}
