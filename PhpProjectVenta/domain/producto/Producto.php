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
    
    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getNombreProducto() {
        return $this->nombreProducto;
    }

    public function getPrecioProducto() {
        return $this->precioProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function setNombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }

    public function setPrecioProducto($precioProducto) {
        $this->precioProducto = $precioProducto;
    }
    public function getIdMateriaPrima() {
        return $this->idMateriaPrima;
    }

    public function setIdMateriaPrima($idMateriaPrima) {
        $this->idMateriaPrima = $idMateriaPrima;
    }
}
