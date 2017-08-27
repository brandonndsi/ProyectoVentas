<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Venta
 *
 * @author Brandon
 */

class Venta {

    private $idVenta;
    private $idEmpleado;
    private $cantidadProductoVenta;
    private $idProducto;
    private $idZona;
    private $totalVenta;
    private $pagaVenta;
    private $vueltoVenta;
    private $idFactura;
    
    function Venta($idVenta, $idEmpleado, $cantidadProductoVenta, $idProducto, $idZona, $totalVenta, $pagaVenta, $vueltoVenta, $idFactura) {
        $this->idVenta = $idVenta;
        $this->idEmpleado = $idEmpleado;
        $this->cantidadProductoVenta = $cantidadProductoVenta;
        $this->idProducto = $idProducto;
        $this->idZona = $idZona;
        $this->totalVenta = $totalVenta;
        $this->pagaVenta = $pagaVenta;
        $this->vueltoVenta = $vueltoVenta;
        $this->idFactura = $idFactura;
    }

    public function getIdVenta() {
        return $this->idVenta;
    }

    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function getCantidadProductoVenta() {
        return $this->cantidadProductoVenta;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getIdZona() {
        return $this->idZona;
    }

    public function getTotalVenta() {
        return $this->totalVenta;
    }

    public function getPagaVenta() {
        return $this->pagaVenta;
    }

    public function getVueltoVenta() {
        return $this->vueltoVenta;
    }

    public function getIdFactura() {
        return $this->idFactura;
    }

    public function setIdVenta($idVenta) {
        $this->idVenta = $idVenta;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setCantidadProductoVenta($cantidadProductoVenta) {
        $this->cantidadProductoVenta = $cantidadProductoVenta;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function setIdZona($idZona) {
        $this->idZona = $idZona;
    }

    public function setTotalVenta($totalVenta) {
        $this->totalVenta = $totalVenta;
    }

    public function setPagaVenta($pagaVenta) {
        $this->pagaVenta = $pagaVenta;
    }

    public function setVueltoVenta($vueltoVenta) {
        $this->vueltoVenta = $vueltoVenta;
    }

    public function setIdFactura($idFactura) {
        $this->idFactura = $idFactura;
    }

}
