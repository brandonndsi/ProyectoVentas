<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data persona y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */
include '../data/empleadoData.php';

class empleadoBusiness {

    private $DataEmpleado;

    public function empleadoBusiness() {
        
        require_once '../../data/dataempleado/DataEmpleado.php';
        $this->DataEmpleado = new DataEmpleado();
    }
    
    //se enecarga de la crear el nuevo empleado a la base de dattos
    public function getTBEmpleadoNuevo($empleado) {
        return $this->DataEmpleado->getTBEmpleadoNuevo($empleado);
    }
    
    //se encarga de actualizar los datos de la base de datos de empleado.
    public function getTBEmpleadoActualizar($empleado){
        return $this->DataEmpleado->getTBEmpleadoActualizar($empleado);
    }
    
    //se encarga de eliminar el empleado de la tabla.
    public function getTBEmpleadoEliminar($empleado) {
        return $this->DataEmpleado->getTBEmpleadoEliminar($empleado);
    }
    
    //se encarga de realizar la consulta y retornar todos los empleado
    public function getTBEmpleadoTodo($empleado) {
        return $this->DataEmpleado->getTBEmpleadoTodo($empleado);
    }
    
    //se encarga de buscar los datos de empleado de la base de datos
    public function getTBEmpleadoBuscar($empleado) {
        return $this->DataEmpleado->getTBEmpleadoBuscar($empleado);
    }
    
}
