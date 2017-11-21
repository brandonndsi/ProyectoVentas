<?php

include '../../domain/personas/Personas.php';

class Clientes extends Personas {

    private $clienteId;
    private $personaId;
    private $clienteDireccionExacta;
    private $clienteDescuento;
    private $clienteAcumulado;
    private $millas;

    public function Clientes($clienteId, $personaId, $clienteDireccionExacta, $clienteDescuento, $clienteAcumulado, $millas) {
        $this->clienteId = $clienteId;
        $this->personaId = $personaId;
        $this->clienteDireccionExacta = $clienteDireccionExacta;
        $this->clienteDescuento = $clienteDescuento;
        $this->clienteAcumulado = $clienteAcumulado;
        $this->millas = $millas;
    }

    public function getClienteId() {
        return $this->clienteId;
    }

    public function getPersonaId() {
        return $this->personaId;
    }

    public function getClienteDireccionExacta() {
        return $this->clienteDireccionExacta;
    }

    public function getClienteDescuento() {
        return $this->clienteDescuento;
    }

    public function getClienteAcumulado() {
        return $this->clienteAcumulado;
    }

    public function getMillas() {
        return $this->millas;
    }

    public function setClienteId($clienteId) {
        $this->clienteId = $clienteId;
    }

    public function setPersonaId($personaId) {
        $this->personaId = $personaId;
    }

    public function setClienteDireccionExacta($clienteDireccionExacta) {
        $this->clienteDireccionExacta = $clienteDireccionExacta;
    }

    public function setClienteDescuento($clienteDescuento) {
        $this->clienteDescuento = $clienteDescuento;
    }

    public function setClienteAcumulado($clienteAcumulado) {
        $this->clienteAcumulado = $clienteAcumulado;
    }

    public function setMillas($millas) {
        $this->millas = $millas;
    }

}

?>