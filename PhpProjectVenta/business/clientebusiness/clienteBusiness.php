<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data persona y pasandole como parameros los datos
 * recogidos en las variables.
 * 
 * @author David Salas Lorente
 */


class clienteBusiness {
   private $clienteData;

    public function empleadoBusiness() {
        $this->clienteData = new clienteData();
    }

    public function insertTBCliente($cliente) {
        return $this->clienteData->insertTBCliente($cliente);
    }

    public function updateTBCliente($Cliente){
        return $this->clienteData->updateTBCliente($cliente);
    }

    public function deleteTBCliente($idCliente) {
        return $this->clienteData->deleteTBCliente($idCliente);
    }

    public function getAllTBCliente() {
        return $this->clienteData->getAllTBcliente();
    }
    
    public function getClienteInventary() {
        return $this->clientedoData->getClienteInventary();
    }
}
