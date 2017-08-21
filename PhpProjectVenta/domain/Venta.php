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

    function getIdVenta() {
        return $this->idVenta;
    }

    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function getCantidadProductoVenta() {
        return $this->cantidadProductoVenta;
    }

    function getIdProducto() {
        return $this->idProducto;
    }

    function getIdZona() {
        return $this->idZona;
    }

    function getTotalVenta() {
        return $this->totalVenta;
    }

    function getPagaVenta() {
        return $this->pagaVenta;
    }

    function getVueltoVenta() {
        return $this->vueltoVenta;
    }

    function getIdFactura() {
        return $this->idFactura;
    }

    function setIdVenta($idVenta) {
        $this->idVenta = $idVenta;
    }

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    function setCantidadProductoVenta($cantidadProductoVenta) {
        $this->cantidadProductoVenta = $cantidadProductoVenta;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setIdZona($idZona) {
        $this->idZona = $idZona;
    }

    function setTotalVenta($totalVenta) {
        $this->totalVenta = $totalVenta;
    }

    function setPagaVenta($pagaVenta) {
        $this->pagaVenta = $pagaVenta;
    }

    function setVueltoVenta($vueltoVenta) {
        $this->vueltoVenta = $vueltoVenta;
    }

    function setIdFactura($idFactura) {
        $this->idFactura = $idFactura;
    }

}
