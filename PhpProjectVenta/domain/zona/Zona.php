<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Zona
 *
 * @author Brandon
 */
class Zona {
    
    private $idZona;
    private $nombreZona;
    private $precioZona;

    
    function Zona($idZona, $nombreZona, $precioZona) {
        $this->idZona = $idZona;
        $this->nombreZona = $nombreZona;
        $this->precioZona = $precioZona;
    }

    public function getIdZona() {
        return $this->idZona;
    }

    public function getNombreZona() {
        return $this->nombreZona;
    }

    public function getPrecioZona() {
        return $this->precioZona;
    }

    public function setIdZona($idZona) {
        $this->idZona = $idZona;
    }

    public function setNombreZona($nombreZona) {
        $this->nombreZona = $nombreZona;
    }

    public function setPrecioZona($precioZona) {
        $this->precioZona = $precioZona;
    }
    
}
