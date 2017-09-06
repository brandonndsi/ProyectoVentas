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

    
    public function Clientes($clienteId, $personaId, $clientedireccionexacta) {
        $this->clienteId = $clienteId;
        $this->personaId = $personaId;
        $this->clienteDireccionExacta = $clienteDireccionExacta;
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

    public function setClienteId($clienteId) {
        $this->ClienteId = $clienteId;
    }

    public function setPersonaId($personaId) {
        $this->personaId = $personaId;
    }

    public function setClienteDireccionExacta($clienteEireccionExacta) {
        $this->clienteDireccionExacta = $clienteDireccionExacta;
    }
    
}

?>