<?php
/**
 * Description of Proveedor
 *
 * @author Juancho
 * 
 */
class Proveedores {

    private $proveedorId;
    private $tipoMateriaPrima;
    private $proveedornombre;
    private $personaid;
    private $materiaprimaid;
    private $proveedorcantidadproducto;
    private $proveedortotalproducto;
    
    function Proveedores($proveedorId, $tipoMateriaPrima, $proveedornombre, $personaid, $materiaprimaid, $proveedorcantidadproducto, $proveedortotalproducto) {
        $this->proveedorId = $proveedorId;
        $this->tipoMateriaPrima = $tipoMateriaPrima;
        $this->proveedornombre = $proveedornombre;
        $this->personaid = $personaid;
        $this->materiaprimaid = $materiaprimaid;
        $this->proveedorcantidadproducto = $proveedorcantidadproducto;
        $this->proveedortotalproducto = $proveedortotalproducto;
    }
    
    function getProveedorId() {
        return $this->proveedorId;
    }

    function getTipoMateriaPrima() {
        return $this->tipoMateriaPrima;
    }

    function getProveedornombre() {
        return $this->proveedornombre;
    }

    function getPersonaid() {
        return $this->personaid;
    }

    function getMateriaprimaid() {
        return $this->materiaprimaid;
    }

    function getProveedorcantidadproducto() {
        return $this->proveedorcantidadproducto;
    }

    function getProveedortotalproducto() {
        return $this->proveedortotalproducto;
    }

    function setProveedorId($proveedorId) {
        $this->proveedorId = $proveedorId;
    }

    function setTipoMateriaPrima($tipoMateriaPrima) {
        $this->tipoMateriaPrima = $tipoMateriaPrima;
    }

    function setProveedornombre($proveedornombre) {
        $this->proveedornombre = $proveedornombre;
    }

    function setPersonaid($personaid) {
        $this->personaid = $personaid;
    }

    function setMateriaprimaid($materiaprimaid) {
        $this->materiaprimaid = $materiaprimaid;
    }

    function setProveedorcantidadproducto($proveedorcantidadproducto) {
        $this->proveedorcantidadproducto = $proveedorcantidadproducto;
    }

    function setProveedortotalproducto($proveedortotalproducto) {
        $this->proveedortotalproducto = $proveedortotalproducto;
    }
}
