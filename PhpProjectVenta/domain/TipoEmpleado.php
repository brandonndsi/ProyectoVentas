<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author Brandon
 */

class TipoEmpleado {
    
    private $tipoEmpleado;
    private $salarioBaseEmpleado;
    private $descripcionEmpleado;
    
    function TipoEmpleado($tipoEmpleado, $salarioBaseEmpleado, $descripcionEmpleado) {
        $this->tipoEmpleado = $tipoEmpleado;
        $this->salarioBaseEmpleado = $salarioBaseEmpleado;
        $this->descripcionEmpleado = $descripcionEmpleado;
    }
    
    public function getTipoEmpleado() {
        return $this->tipoEmpleado;
    }

    public function getSalarioBaseEmpleado() {
        return $this->salarioBaseEmpleado;
    }

    public function getDescripcionEmpleado() {
        return $this->descripcionEmpleado;
    }

    public function setTipoEmpleado($tipoEmpleado) {
        $this->tipoEmpleado = $tipoEmpleado;
    }

    public function setSalarioBaseEmpleado($salarioBaseEmpleado) {
        $this->salarioBaseEmpleado = $salarioBaseEmpleado;
    }

    public function setDescripcionEmpleado($descripcionEmpleado) {
        $this->descripcionEmpleado = $descripcionEmpleado;
    }

}
