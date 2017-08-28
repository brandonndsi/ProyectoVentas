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
        $this->DataPersona= new DataPersona();
        
    }
    
    //se encarga de introducir el nuevo cliente persona
    public function getTBClienteNuevo($cliente) {
        return $this->DataPersona->insertar($cliente);
    }
    
    //se encarga de actualizar los datos del cliente en la tabla.
    public function getTBClienteActualizar($cliente){
        return $this->DataPersona->modificar($cliente);
    }
    
    //se encarga de eliminar el cliente que desea en la base de datos.
    public function getTBClienteEliminar($cliente) {
        return $this->DataPersona->eliminar($cliente);
    }
    
    //se encarga de seleccionar todo los datos del cliente.
    public function getTBClienteTodo() {
        return $this->DataPersona->get_personas();
    }
    
    //se encarga de la busqueda d elos clientes en la base de datos.
    public function getTBClienteBuscar($cliente) {
        return $this->DataPersona->obtener($cliente);
    }
    
}
