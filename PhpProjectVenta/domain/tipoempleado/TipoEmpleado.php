<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.david mofidico y implemento el atributo
 *hora extra el cual esta en la base de datos.
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
    private $horaExtra;
    
    function TipoEmpleado($tipoEmpleado, $salarioBaseEmpleado, $descripcionEmpleado,$horaExtra) {
        $this->tipoEmpleado = $tipoEmpleado;
        $this->salarioBaseEmpleado = $salarioBaseEmpleado;
        $this->descripcionEmpleado = $descripcionEmpleado;
        $this->$horaExtra=$horaExtra;
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

    public function getHoraExtra($horaExtra){
        $this->$horaExtra=$horaExtra;
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

    public function setHoraExtra($horaExtra){
        $this->$horaExtra=$horaExtra;
    }
}
