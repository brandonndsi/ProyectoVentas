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
class Persona{

private $telefonoPersona;
private $nombrePersona;
private $apellido1Persona;
private $apellido2Persona;
private $idZona;


function Persona($telefonoPersona, $nombrePersona, $apellido1Persona, $apellido2Persona, $idZona) {
    $this->super();
    $this->telefonoPersona = $telefonoPersona;
    $this->nombrePersona = $nombrePersona;
    $this->apellido1Persona = $apellido1Persona;
    $this->apellido2Persona = $apellido2Persona;
    $this->idZona = $idZona;
}

public function getTelefonoPersona() {
    return $this->telefonoPersona;
}

public function getNombrePersona() {
    return $this->nombrePersona;
}

public function getApellido1Persona() {
    return $this->apellido1Persona;
}

public function getApellido2Persona() {
    return $this->apellido2Persona;
}

public function getIdZona() {
    return $this->idZona;
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

function setIdZona($idZona) {
    $this->idZona = $idZona;
}

}
