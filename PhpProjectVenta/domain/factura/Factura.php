<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Factura
 *
 * @author Brandon
 */

class Factura extends Persona{
    
    private $idFactura;
    private $telefonoPersona;
    private $fechaFactura;

    function Factura($idFactura, $telefonoPersona, $fechaFactura) {
        $this->idFactura = $idFactura;
        $this->telefonoPersona = $telefonoPersona;
        $this->fechaFactura = $fechaFactura;
    }
    
    public function getIdFactura() {
        return $this->idFactura;
    }

    public function getTelefonoPersona() {
        return $this->telefonoPersona;
    }

    public function getFechaFactura() {
        return $this->fechaFactura;
    }

    public function setIdFactura($idFactura) {
        $this->idFactura = $idFactura;
    }

    public function setTelefonoPersona($telefonoPersona) {
        $this->telefonoPersona = $telefonoPersona;
    }

    public function setFechaFactura($fechaFactura) {
        $this->fechaFactura = $fechaFactura;
    }
}
