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

    private $empleadoData;

    public function empleadoBusiness() {
        $this->empleadoData = new empleadoData();
    }

    public function insertTBEmpleado($empleado) {
        return $this->empleadoData->insertTBEmpleado($empleado);
    }
    
    public function updateTBEmpleado($empleado){
        return $this->empleadoData->updateTBEmpleado($empleado);
    }

    public function deleteTBEmpleado($idEmpleado) {
        return $this->empleadoData->deleteTBEmpleado($idEmpleado);
    }

    public function getAllTBEmpleado() {
        return $this->empleadoData->getAllTBEmpleado();
    }
    
    /*public function getEmpleadosInventary() {
        return $this->empleadoData->getEmpleadosInventary();
    }*/
    
}
