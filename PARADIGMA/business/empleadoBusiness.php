<?php

include '../data/empleadoData.php';

class empleadoBusiness {

    private $empleadoData;

    public function empleadoBusiness() {
        $this->empleadoData = new empleadoData();
    }

    public function insertTBEmpleado($empleado) {
        return $this->empleadoData->insertTBBull($empleado);
    }

    public function updateTBEmpleado($empleado) {
        return $this->empleadoData->updateTBempleaoo($empleado);
    }

    public function deleteTBEmpleado($idempleado) {
        return $this->empleadoData->deleteTBEmpleado($idempleado);
    }

    public function getAllTBempleado() {
        return $this->empleadoData->getAllTBempleado();
    }
    
    public function getempleadoInventary() {
        return $this->empleadoData->getempleadoInventary();
    }
    
}