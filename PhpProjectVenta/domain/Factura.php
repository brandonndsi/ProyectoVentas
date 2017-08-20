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
    function getIdFactura() {
        return $this->idFactura;
    }

    function getTelefonoPersona() {
        return $this->telefonoPersona;
    }

    function getFechaFactura() {
        return $this->fechaFactura;
    }

    function setIdFactura($idFactura) {
        $this->idFactura = $idFactura;
    }

    function setTelefonoPersona($telefonoPersona) {
        $this->telefonoPersona = $telefonoPersona;
    }

    function setFechaFactura($fechaFactura) {
        $this->fechaFactura = $fechaFactura;
    }
}
