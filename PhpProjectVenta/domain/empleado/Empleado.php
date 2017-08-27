<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author Brandon
 */
class Empleado extends Persona{
    
private $idEmpleado;
private $tipoEmpleado;
private $telefonoPersona;
private $cedulaEmpleado;
private $contraseñaEmpleado;
private $correoEmpleado;
private $edadEmpleado;
private $sexoEmpleado;
private $estadoCivilEmpleado;
private $cuentaBancariaEmpleado;

function Empleado($idEmpleado, $tipoEmpleado, $telefonoPersona, $cedulaEmpleado, $contraseñaEmpleado, $correoEmpleado, $edadEmpleado, $sexoEmpleado, $estadoCivilEmpleado, $cuentaBancariaEmpleado) {
    $this->idEmpleado = $idEmpleado;
    $this->tipoEmpleado = $tipoEmpleado;
    $this->telefonoPersona = $telefonoPersona;
    $this->cedulaEmpleado = $cedulaEmpleado;
    $this->contraseñaEmpleado = $contraseñaEmpleado;
    $this->correoEmpleado = $correoEmpleado;
    $this->edadEmpleado = $edadEmpleado;
    $this->sexoEmpleado = $sexoEmpleado;
    $this->estadoCivilEmpleado = $estadoCivilEmpleado;
    $this->cuentaBancariaEmpleado = $cuentaBancariaEmpleado;
}

public function getIdEmpleado() {
    return $this->idEmpleado;
}

public function getTipoEmpleado() {
    return $this->tipoEmpleado;
}

public function getTelefonoPersona() {
    return $this->telefonoPersona;
}

public function getCedulaEmpleado() {
    return $this->cedulaEmpleado;
}

public function getContraseñaEmpleado() {
    return $this->contraseñaEmpleado;
}

public function getCorreoEmpleado() {
    return $this->correoEmpleado;
}

public function getEdadEmpleado() {
    return $this->edadEmpleado;
}

public function getSexoEmpleado() {
    return $this->sexoEmpleado;
}

public function getEstadoCivilEmpleado() {
    return $this->estadoCivilEmpleado;
}

public function getCuentaBancariaEmpleado() {
    return $this->cuentaBancariaEmpleado;
}

public function setIdEmpleado($idEmpleado) {
    $this->idEmpleado = $idEmpleado;
}

public function setTipoEmpleado($tipoEmpleado) {
    $this->tipoEmpleado = $tipoEmpleado;
}

public function setTelefonoPersona($telefonoPersona) {
    $this->telefonoPersona = $telefonoPersona;
}

public function setCedulaEmpleado($cedulaEmpleado) {
    $this->cedulaEmpleado = $cedulaEmpleado;
}

public function setContraseñaEmpleado($contraseñaEmpleado) {
    $this->contraseñaEmpleado = $contraseñaEmpleado;
}

public function setCorreoEmpleado($correoEmpleado) {
    $this->correoEmpleado = $correoEmpleado;
}

public function setEdadEmpleado($edadEmpleado) {
    $this->edadEmpleado = $edadEmpleado;
}

public function setSexoEmpleado($sexoEmpleado) {
    $this->sexoEmpleado = $sexoEmpleado;
}

public function setEstadoCivilEmpleado($estadoCivilEmpleado) {
    $this->estadoCivilEmpleado = $estadoCivilEmpleado;
}

public function setCuentaBancariaEmpleado($cuentaBancariaEmpleado) {
    $this->cuentaBancariaEmpleado = $cuentaBancariaEmpleado;
}

}
