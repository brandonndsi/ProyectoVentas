<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data persona y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */
class tipoEmpleadoBusiness {
    
    private $DataTipoEmpleado;

    public function empleadoBusiness() {
        
        include_once '../../data/datatipoempleado/DataTipoEmpleado.php';
        $this->DataTipoEmpleado = new DataTipoEmpleado();
        
    }
    
    //se encarga de crear un nuevo elemento en la tabla de la base de datos.
    public function getTBTipoEmpleadoNuevo($tipoEmpleado) {
        return $this->DataTipoEmpleado->getTBTipoEmpleadoNuevo($tipoEmpleado);
    }
    
    //se encarga de actualizar los datos de la tabla empleado.
    public function getTBTipoEmpleadoActualizar($tipoEmpleado) {
        return $this->DataTipoEmpleado>getTBTipoEmpleadoActualizar($tipoEmpleado);
    }
    
    //se encarga de eliminar el tipo de empleado de la tabla.
    public function getTBTipoEmpleadoEliminar($tipoEmpleado) {
        return $this->DataTipoEmpleado->getTBTipoEmpleadoEliminar($tipoEmpleado);
    }
    
    //se encarga de seleccionar todos los empleado y retornar el resultado.
    public function getTBTipoEmpleadoTodos() {
        return $this->DataTipoEmpleado->getTBTipoEmpleadoTodos();
    }
    
    //se encarga de buscar un dato en la tabla y retornar dicho resultado si existe.
    public function getTBTipoEmpleadoBuscar($tipoempleado){
        return $this->DataTipoEmpleado->getTBTipoEmpleadoBuscar($tipoempleado);
    }
}
