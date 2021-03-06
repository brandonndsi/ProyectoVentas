<?php

class tipoEmpleadoBusiness {
    
   private $DataTipoEmpleado;

    public function tipoEmpleadoBusiness() {
        
        require_once '../../data/datatipoempleado/DataTipoEmpleado.php';
        $this->DataTipoEmpleado= new DataTipoEmpleado();
        
    }
    
    //se encarga de introducir el nuevo cliente persona
    public function insertarTipoEmpleado($TipoEmpleado) {
        return $this->DataTipoEmpleado->insertarTipo($TipoEmpleado);
    }
    
    //se encarga de actualizar los datos del cliente en la tabla.
    public function modificarTipoEmpleado($TipoEmpleado){
        return $this->DataTipoEmpleado->modificarTipo($TipoEmpleado);
    }
    
    //se encarga de eliminar el cliente que desea en la base de datos.
    public function eliminarTipoEmpleado($TipoEmpleado) {
        return $this->DataTipoEmpleado->eliminarTipo($TipoEmpleado);
    }
    
    //se encarga de seleccionar todo los datos del cliente.
    public function mostrarTipoEmpleado() {
        return $this->DataTipoEmpleado->mostrarTipo();
    }
    
    //se encarga de la busqueda d elos clientes en la base de datos.
    public function buscarTipoEmpleado($TipoEmpleado) {
        return $this->DataTipoEmpleado->buscarTipo($TipoEmpleado);
    }
  
}
/*$data=new clienteBusiness();
  $d=$data->mostrarClientes();
  print_r($d); */

?>