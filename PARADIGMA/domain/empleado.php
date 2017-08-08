<?php

class empleado {

    
    private $cedula;

    function empleado($cedula) {
        $this->cedula = $cedula;

    }

    function getIdTBEmpleado() {
        return $this->cedula;
    }
    
    public function getRanchTBBull() {
        return $this->ranchTBBull;
    }

    function setIdTBEmpleado($idempleado) {
        $this->idempleado = $idempleado;
    }


}
?>
