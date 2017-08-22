<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MateriaPrima
 *
 * @author Brandon
 */

class MateriaPrima {
    
    private $idMateriaPrima;
    private $nombreMateriaPrima;
    private $precioMateriaPrima;

    function MateriaPrima($idMateriaPrima, $nombreMateriaPrima, $precioMateriaPrima) {
        $this->idMateriaPrima = $idMateriaPrima;
        $this->nombreMateriaPrima = $nombreMateriaPrima;
        $this->precioMateriaPrima = $precioMateriaPrima;
    }
    
    public function getIdMateriaPrima() {
        return $this->idMateriaPrima;
    }

    public function getNombreMateriaPrima() {
        return $this->nombreMateriaPrima;
    }

    public function getPrecioMateriaPrima() {
        return $this->precioMateriaPrima;
    }

    public function setIdMateriaPrima($idMateriaPrima) {
        $this->idMateriaPrima = $idMateriaPrima;
    }

    public function setNombreMateriaPrima($nombreMateriaPrima) {
        $this->nombreMateriaPrima = $nombreMateriaPrima;
    }

    public function setPrecioMateriaPrima($precioMateriaPrima) {
        $this->precioMateriaPrima = $precioMateriaPrima;
    }
    
}
