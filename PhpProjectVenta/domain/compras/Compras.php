<?php

/**
 * Description of Venta
 *
 * @author Brandon
 */

class Compras {
    
    private $compraid;
    private $materiaprimaid;
    private $compracantidad;
    private $compraestado;
    
    
    public function Compras($compraid, $materiaprimaid, $compracantidad, $compraestado) {
        $this->compraid = $compraid;
        $this->materiaprimaid = $materiaprimaid;
        $this->compracantidad = $compracantidad;
        $this->compraestado = $compraestado;
    }
    public function getCompraid() {
        return $this->compraid;
    }

    public function getMateriaprimaid() {
        return $this->materiaprimaid;
    }

    public function getCompracantidad() {
        return $this->compracantidad;
    }

    public function getCompraestado() {
        return $this->compraestado;
    }

    public function setCompraid($compraid) {
        $this->compraid = $compraid;
    }

    public function setMateriaprimaid($materiaprimaid) {
        $this->materiaprimaid = $materiaprimaid;
    }

    public function setCompracantidad($compracantidad) {
        $this->compracantidad = $compracantidad;
    }

    public function setCompraestado($compraestado) {
        $this->compraestado = $compraestado;
    }
}

