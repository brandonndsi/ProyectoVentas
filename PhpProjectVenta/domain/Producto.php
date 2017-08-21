<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author Brandon
 */

class Producto extends MateriaPrima{
    
    private $idProducto;
    private $nombreProducto;
    private $precioProducto;
    private $idMateriaPrima;


    function Producto($idProducto, $nombreProducto, $precioProducto, $idMateriaPrima) {
        $this->idProducto = $idProducto;
        $this->nombreProducto = $nombreProducto;
        $this->precioProducto = $precioProducto;
        $this->$idMateriaPrima = $idMateriaPrima;
    }
    function getIdProducto() {
        return $this->idProducto;
    }

    function getNombreProducto() {
        return $this->nombreProducto;
    }

    function getPrecioProducto() {
        return $this->precioProducto;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setNombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }

    function setPrecioProducto($precioProducto) {
        $this->precioProducto = $precioProducto;
    }
    function getIdMateriaPrima() {
        return $this->idMateriaPrima;
    }

    function setIdMateriaPrima($idMateriaPrima) {
        $this->idMateriaPrima = $idMateriaPrima;
    }
}
