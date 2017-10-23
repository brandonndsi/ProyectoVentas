<?php
/**
 * Description of Cliente
 *
 * @author Juan
 */
  include '../../domain/personas/Personas.php';

class Clientes extends Personas{
    
    private $clienteId;
    private $personaId;
    private $clienteDireccionExacta;
    private $clienteDescuento;
    private $clienteAcumulado;
    private $millas;

    public function Clientes($clienteId, $personaId, $clientedireccionexacta) {
        $this->clienteId = $clienteId;
        $this->personaId = $personaId;
        $this->clienteDireccionExacta = $clientedireccionexacta;
        $this->millas=null;
    }
    public function getMillas(){
        return $this->millas;
    }
    public function getClienteId() {
        return $this->clienteId;
    }

    public function getClienteAcumulado(){
        return $this->clienteAcumulado;
    }
    public function getClienteDescuento(){
        return $this->clienteDescuento;
    }
    public function getPersonaId() {
        return $this->personaId;
    }

    public function getClienteDireccionExacta() {
        return $this->clienteDireccionExacta;
    }
    public function setMillas($millas){
        $this->millas=$millas;
    }
    public function setClienteId($clienteId) {
        $this->ClienteId = $clienteId;
    }

    public function setClienteAcumulado($clienteacumulado){
        $this->clienteAcumulado=$clienteacumulado;
    }
    public function setClienteDescuento($clientedescuento){
        $this->clienteDescuento=$clientedescuento;
    }
    public function setPersonaId($personaId) {
        $this->personaId = $personaId;
    }

    public function setClienteDireccionExacta($clienteEireccionExacta) {
        $this->clienteDireccionExacta = $clienteDireccionExacta;
    }
    
}

?>