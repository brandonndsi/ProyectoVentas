<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data persona y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */

class empleadoBusiness {

    private $DataEmpleado;

    public function empleadoBusiness() {
        
        require_once '../../data/dataempleado/DataEmpleado.php';
        $this->DataEmpleado = new DataEmpleado();
    }
    
    //se encarga de la crear el nuevo empleado a la base de datos
    public function insertarEmpleado($empleado) {
        return $this->DataEmpleado->insertarEmpleado($empleado);
    }
    
    //se encarga de actualizar los datos de la base de datos de empleado.
    public function modificarEmpleado($empleado){
        return $this->DataEmpleado->modificarEmpleado($empleado);
    }
    
    //se encarga de eliminar el empleado de la tabla.
    public function eliminarEmpleado($empleadoid) {
        return $this->DataEmpleado->eliminarEmpleado($empleadoid);
    }
    
    //se encarga de realizar la consulta y retornar todos los empleado
    public function mostrarEmpleados() {
        return $this->DataEmpleado->mostrarEmpleados();
    }
    
    //se encarga de buscar los datos de empleado de la base de datos
    public function buscarEmpleado($empleadoid) {
        return $this->DataEmpleado->buscarEmpleado($empleadoid);
    }
    
}
?>