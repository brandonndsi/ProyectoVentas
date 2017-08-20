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
class Persona extends Empleado{

private $telefonoPersona;
private $nombrePersona;
private $apellido1Persona;
private $apellido2Persona;
private $tipoUsuarioPersona;
private $idZona;
private $idEmpleado;


function Persona($telefonoPersona, $nombrePersona, $apellido1Persona, $apellido2Persona, $tipoUsuarioPersona, $idZona, $idEmpleado) {
    $this->super();
    $this->telefonoPersona = $telefonoPersona;
    $this->nombrePersona = $nombrePersona;
    $this->apellido1Persona = $apellido1Persona;
    $this->apellido2Persona = $apellido2Persona;
    $this->tipoUsuarioPersona = $tipoUsuarioPersona;
    $this->idZona = $idZona;
    $this->idEmpleado = $idEmpleado;
}

function getTelefonoPersona() {
    return $this->telefonoPersona;
}

function getNombrePersona() {
    return $this->nombrePersona;
}

function getApellido1Persona() {
    return $this->apellido1Persona;
}

function getApellido2Persona() {
    return $this->apellido2Persona;
}

function getTipoPersona() {
    return $this->tipoPersona;
}

function getIdZona() {
    return $this->idZona;
}

function getIdEmpleado() {
    return $this->idEmpleado;
}

function setTelefonoPersona($telefonoPersona) {
    $this->telefonoPersona = $telefonoPersona;
}

function setNombrePersona($nombrePersona) {
    $this->nombrePersona = $nombrePersona;
}

function setApellido1Persona($apellido1Persona) {
    $this->apellido1Persona = $apellido1Persona;
}

function setApellido2Persona($apellido2Persona) {
    $this->apellido2Persona = $apellido2Persona;
}

function setTipoUsuarioPersona($tipoUsuarioPersona) {
    $this->tipoUsuarioPersona = $tipoUsuarioPersona;
}

function setIdZona($idZona) {
    $this->idZona = $idZona;
}

function setIdEmpleado($idEmpleado) {
    $this->idEmpleado = $idEmpleado;
}

}
