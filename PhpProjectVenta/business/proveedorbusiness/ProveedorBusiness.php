<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data persona y pasandole como parameros los datos
 * recogidos en las variables.
 * 
 * @author David Salas Lorente
 */


class ProveedorBusiness {
    
   private $DataProveedor;

    public function ProveedorBusiness() {
        
        require_once '../../data/dataproveedor/DataProveedor.php';
        $this->DataProveedor= new DataProveedor();
        
    }
    
    //se encarga de introducir el nuevo cliente persona
    public function insertarProveedor($proveedor) {
        return $this->DataProveedor->insertarProveedor($proveedor);
    }
    
    //se encarga de actualizar los datos del cliente en la tabla.
    public function modificarProveedor($proveedor){
        return $this->DataProveedor->modificarProveedor($proveedor);
    }
    
    //se encarga de eliminar el cliente que desea en la base de datos.
    public function eliminarProveedor($proveedorid) {
        return $this->DataProveedor->eliminarProveedor($proveedorid);
    }
    
    //se encarga de seleccionar todo los datos del cliente.
    public function mostrarProveedor() {
        return $this->DataProveedor->mostrarProveedor();
    }
    
    //se encarga de la busqueda d elos clientes en la base de datos.
    public function buscarProveedor($proveedorid) {
        return $this->DataProveedor->buscarProveedor($proveedorid);
    }
  
}
/*$data=new clienteBusiness();
  $d=$data->eliminarCliente(1);
  print_r($d); */

?>