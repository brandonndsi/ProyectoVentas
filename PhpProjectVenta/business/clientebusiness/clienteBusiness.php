<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data persona y pasandole como parameros los datos
 * recogidos en las variables.
 * 
 * @author David Salas Lorente
 */


class clienteBusiness {
    
   private $DataPersona;

    public function clienteBusiness() {
        
        require_once '../../data/datapersona/DataPersona.php';
        $this->DataPersona= new DataCliente();
        
    }
    
    //se encarga de introducir el nuevo cliente persona
    public function insertarCliente($cliente) {
        return $this->DataPersona->insertarCliente($cliente);
    }
    
    //se encarga de actualizar los datos del cliente en la tabla.
    public function modificarCliente($cliente){
        return $this->DataPersona->modificarCliente($cliente);
    }
    
    //se encarga de eliminar el cliente que desea en la base de datos.
    public function eliminarCliente($clienteid) {
        return $this->DataPersona->eliminarCliente($clienteid);
    }
    
    //se encarga de seleccionar todo los datos del cliente.
    public function mostrarClientes() {
        return $this->DataPersona->mostrarClientes();
    }
    
    //se encarga de la busqueda d elos clientes en la base de datos.
    public function buscarCliente($clienteid) {
        return $this->DataPersona->buscarCliente($clienteid);
    }
    
}
