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
class Empleado{
    
private $idEmpleado;
private $cedulaEmpleado;
private $contraseñaEmpleado;
private $correoEmpleado;
private $cuentaBancariaEmpleado;
private $sexoEmpleado;
private $estadoCivilEmpleado;
private $edadEmpleado;
private $salarioBaseEmpleado;
private $descripcionEmpleado;

function Empleado($idEmpleado, $cedulaEmpleado, $contraseñaEmpleado, $correoEmpleado, $cuentaBancariaEmpleado, $sexoEmpleado, $estadoCivilEmpleado, $edadEmpleado, $salarioBaseEmpleado, $descripcionEmpleado) {
    $this->idEmpleado = $idEmpleado;
    $this->cedulaEmpleado = $cedulaEmpleado;
    $this->contraseñaEmpleado = $contraseñaEmpleado;
    $this->correoEmpleado = $correoEmpleado;
    $this->cuentaBancariaEmpleado = $cuentaBancariaEmpleado;
    $this->sexoEmpleado = $sexoEmpleado;
    $this->estadoCivilEmpleado = $estadoCivilEmpleado;
    $this->edadEmpleado = $edadEmpleado;
    $this->salarioBaseEmpleado = $salarioBaseEmpleado;
    $this->descripcionEmpleado = $descripcionEmpleado;
}
function getIdEmpleado() {
    return $this->idEmpleado;
}

function getCedulaEmpleado() {
    return $this->cedulaEmpleado;
}

function getContraseñaEmpleado() {
    return $this->contraseñaEmpleado;
}

function getCorreoEmpleado() {
    return $this->correoEmpleado;
}

function getCuentaBancariaEmpleado() {
    return $this->cuentaBancariaEmpleado;
}

function getSexoEmpleado() {
    return $this->sexoEmpleado;
}

function getEstadoCivilEmpleado() {
    return $this->estadoCivilEmpleado;
}

function getEdadEmpleado() {
    return $this->edadEmpleado;
}

function getSalarioBaseEmpleado() {
    return $this->salarioBaseEmpleado;
}

function getDescripcionEmpleado() {
    return $this->descripcionEmpleado;
}

function setIdEmpleado($idEmpleado) {
    $this->idEmpleado = $idEmpleado;
}

function setCedulaEmpleado($cedulaEmpleado) {
    $this->cedulaEmpleado = $cedulaEmpleado;
}

function setContraseñaEmpleado($contraseñaEmpleado) {
    $this->contraseñaEmpleado = $contraseñaEmpleado;
}

function setCorreoEmpleado($correoEmpleado) {
    $this->correoEmpleado = $correoEmpleado;
}

function setCuentaBancariaEmpleado($cuentaBancariaEmpleado) {
    $this->cuentaBancariaEmpleado = $cuentaBancariaEmpleado;
}

function setSexoEmpleado($sexoEmpleado) {
    $this->sexoEmpleado = $sexoEmpleado;
}

function setEstadoCivilEmpleado($estadoCivilEmpleado) {
    $this->estadoCivilEmpleado = $estadoCivilEmpleado;
}

function setEdadEmpleado($edadEmpleado) {
    $this->edadEmpleado = $edadEmpleado;
}

function setSalarioBaseEmpleado($salarioBaseEmpleado) {
    $this->salarioBaseEmpleado = $salarioBaseEmpleado;
}

function setDescripcionEmpleado($descripcionEmpleado) {
    $this->descripcionEmpleado = $descripcionEmpleado;
}

}
