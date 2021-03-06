<?php

class clienteBusiness {
    
   private $DataCliente;

    public function clienteBusiness() {
        
        require_once '../../data/datacliente/DataCliente.php';
        $this->DataCliente= new DataCliente();
        
    }
    
    //se encarga de introducir el nuevo cliente persona
    public function insertarCliente($cliente) {
        return $this->DataCliente->insertarCliente($cliente);
    }
    
    //se encarga de actualizar los datos del cliente en la tabla.
    public function modificarCliente($cliente){
        return $this->DataCliente->modificarCliente($cliente);
    }
    
    //se encarga de eliminar el cliente que desea en la base de datos.
    public function eliminarCliente($clienteid) {
        return $this->DataCliente->eliminarCliente($clienteid);
    }
    
    //se encarga de seleccionar todo los datos del cliente.
    public function mostrarClientes() {
        return $this->DataCliente->mostrarClientes();
    }
    
    //se encarga de la busqueda d elos clientes en la base de datos.
    public function buscarCliente($clienteid) {
        return $this->DataCliente->buscarCliente($clienteid);
    }
  
}

?>