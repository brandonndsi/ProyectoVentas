<?php
/**
 * Description El cliente extiende de  la clase persona dicha
 * clase se encarga de llenar los datos del mismo.
 *
 * @author David Salas Lorente
 */
class Cliente extends Persona{

private $idCliente;
private $nombreCliente;
private $apellido1Cliente;
private $apellido2Cliente;
private $tipoUsuarioCliente;
private $telefonoCliente ;
private $idZona;
private $idFactura;
private $fechaFactura;

function Cliente($idCliente,$nombreCliente,$apellido1Cliente,$apellido2Cliente,$tipoUsuarioCliente,$telefonoCliente,$idZona,$idFactura,$fechaFactura){
    //$this->Persona($telefonoPersona, $nombrePersona, $apellido1Persona, $apellido2Persona, $tipoUsuarioPersona, $idZona, $idEmpleado)
    $this->idCliente=$idCliente;
    $this->nombreCliente=$nombreCliente;
    $this->apellido1Cliente=$apellido1Cliente;
    $this->apellido2Cliente=$apellido2Cliente;
    $this->tipoUsuarioCliente=$tipoUsuarioCliente;
    $this->telefonoCliente=$telefonoCliente;
    $this->idZona=$idZona;
    $this->idFactura=$idFactura;
    $this->fechaFactura=$fechaFactura;
}
function getIdFactura(){
    return $this->idFactura;
}
function getFechaFactura(){
   return $this-> fechaFactura; 
}
function getTelefonoCliente() {
    return $this->telefonoCliente;
}

function getNombreCliente() {
    return $this->nombreCliente;
}

function getApellido1Cliente() {
    return $this->apellido1Cliente;
}

function getApellido2Cliente() {
    return $this->apellido2Cliente;
}

function getTipoCliente() {
    return $this->tipoCliente;
}

function getIdZona() {
    return $this->idZona;
}

function getIdCliente() {
    return $this->idCliente;
}

function setTelefonoCliente($telefonoCliente) {
    $this->telefonoCliente = $telefonoCliente;
}

function setNombreCliente($nombreCliente) {
    $this->nombreCliente = $nombreCliente;
}

function setApellido1Cliente($apellido1Cliente) {
    $this->apellido1Cliente = $apellido1Cliente;
}

function setApellido2Cliente($apellido2Cliente) {
    $this->apellido2Cliente = $apellido2Cliente;
}

function setTipoUsuarioCliente($tipoUsuarioCliente) {
    $this->tipoUsuarioCliente = $tipoUsuarioCliente;
}

function setIdZona($idZona) {
    $this->idZona = $idZona;
}

function setIdCliente($idCliente) {
    $this->idCliente = $idCliente;
}
function setIdFactura($idFactura){
    $this->idFactura=$idFactura;
}
function setFechaFactura($fechaFactura){
   $this-> fechaFactura = $fechaFactura; 
}
}
