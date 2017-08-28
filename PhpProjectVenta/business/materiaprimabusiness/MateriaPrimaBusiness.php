<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data materia prima y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */

class MateriaPrimaBusiness {

    private $DataEmpleado;

    public function MateriaPrimaBusiness() {
        
        require_once '../../data/datamateriaprima/DataMateriaPrima.php';
        $this->DataEmpleado = new DataEmpleado();
    }
    
    //se encarga de la crear el nuevo empleado a la base de datos
    public function getTBMateriaPrimaNuevo($empleado) {
        return $this->DataEmpleado->insertar($empleado);
    }
    
    //se encarga de actualizar los datos de la base de datos de empleado.
    public function getTBMateriaPrimaActualizar($empleado){
        return $this->DataEmpleado->modificar($empleado);
    }
    
    //se encarga de eliminar el empleado de la tabla.
    public function getTBMateriaPrimaEliminar($empleado) {
        return $this->DataEmpleado->eliminar($empleado);
    }
    
    //se encarga de realizar la consulta y retornar todos los empleado
    public function getTBMateriaPrimaTodo() {
        return $this->DataEmpleado->get_empleado();
    }
    
    //se encarga de buscar los datos de empleado de la base de datos
    public function getTBMateriaPrimaBuscar($empleado) {
        return $this->DataEmpleado->obtener($empleado);
    }
    
}
?>