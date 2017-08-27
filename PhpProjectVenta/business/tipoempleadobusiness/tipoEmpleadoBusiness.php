<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data persona y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */
class tipoEmpleadoBusiness {
    private $tipoEmpleadoData;

    public function empleadoBusiness() {
        $this->tipoEmpleadoData = new DataTipoEmpleado();
    }

    public function insertTBTipoEmpleado($tipoEmpleado) {
        return $this->tipoEmpleadoData->insertTBTipoEmpleado($tipoEmpleado);
    }

    public function updateTBTipoEmpleado($TipoEnpleado) {
        return $this->tipoEmpleadoData->updateTBTipoEmpleado($tipoEmpleado);
    }

    public function deleteTBTipoEmpleado($idTipoEmpleado) {
        return $this->tipoEmpleadoData->deleteTBTipoEmpleado($idTipoEmpleado);
    }

    public function getAllTBTipoEmpleado() {
        return $this->tipoEmpleadoData->getAllTBTipoEmpleado();
    }
    
    public function getTipoEmpleadoInventary() {
        return $this->tipoEmpleadoData->getTipoEmpleadoInventary();
    }

    public function tipoEmpleadoBuscar($tipoempleado){
        return 0;
    }
}
