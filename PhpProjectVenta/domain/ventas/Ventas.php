<?php

/**
 * Description of Venta
 *
 * @author Brandon
 */

class Ventas {

    private $ventaid;
    private $empleadoid;
    private $ventacantidadproducto;
    private $idProducto;
    private $zonaid;
    private $ventatotal;
    private $ventapagacon;
    private $ventavuelto;
    private $facturaid;
  
    public function Ventas($ventaid, $empleadoid, $ventacantidadproducto, $idProducto, $zonaid, $ventatotal, $ventapagacon, $ventavuelto, $facturaid) {
        $this->ventaid = $ventaid;
        $this->empleadoid = $empleadoid;
        $this->ventacantidadproducto = $ventacantidadproducto;
        $this->idProducto = $idProducto;
        $this->zonaid = $zonaid;
        $this->ventatotal = $ventatotal;
        $this->ventapagacon = $ventapagacon;
        $this->ventavuelto = $ventavuelto;
        $this->facturaid = $facturaid;
    }
    public function getVentaid() {
        return $this->ventaid;
    }

    public function getEmpleadoid() {
        return $this->empleadoid;
    }

    public function getVentacantidadproducto() {
        return $this->ventacantidadproducto;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getZonaid() {
        return $this->zonaid;
    }

    public function getVentatotal() {
        return $this->ventatotal;
    }

    public function getVentapagacon() {
        return $this->ventapagacon;
    }

    public function getVentavuelto() {
        return $this->ventavuelto;
    }

    public function getFacturaid() {
        return $this->facturaid;
    }

    public function setVentaid($ventaid) {
        $this->ventaid = $ventaid;
    }

    public function setEmpleadoid($empleadoid) {
        $this->empleadoid = $empleadoid;
    }

    public function setVentacantidadproducto($ventacantidadproducto) {
        $this->ventacantidadproducto = $ventacantidadproducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function setZonaid($zonaid) {
        $this->zonaid = $zonaid;
    }

    public function setVentatotal($ventatotal) {
        $this->ventatotal = $ventatotal;
    }

    public function setVentapagacon($ventapagacon) {
        $this->ventapagacon = $ventapagacon;
    }

    public function setVentavuelto($ventavuelto) {
        $this->ventavuelto = $ventavuelto;
    }

    public function setFacturaid($facturaid) {
        $this->facturaid = $facturaid;
    }

}
?>