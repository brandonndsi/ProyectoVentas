<?php

/**
 * Description of EmpleadosLiciencias
 *
 * @author Juancho
 */

class EmpleadosLiciencias {

    private $tbempleadolicencias;
    private $empleadolicenciaid;
    private $empleadolicenciavigencia;
    private $vehiculoid;

    public function __construct($tbempleadolicencias, $empleadolicenciaid, $empleadolicenciavigencia, $vehiculoid) {
        $this->tbempleadolicencias = $tbempleadolicencias;
        $this->empleadolicenciaid = $empleadolicenciaid;
        $this->empleadolicenciavigencia = $empleadolicenciavigencia;
        $this->vehiculoid = $vehiculoid;
    }

    public function getTbempleadolicencias() {
        return $this->tbempleadolicencias;
    }

    public function getEmpleadolicenciaid() {
        return $this->empleadolicenciaid;
    }

    public function getEmpleadolicenciavigencia() {
        return $this->empleadolicenciavigencia;
    }

    public function getVehiculoid() {
        return $this->vehiculoid;
    }

    public function setTbempleadolicencias($tbempleadolicencias) {
        $this->tbempleadolicencias = $tbempleadolicencias;
    }

    public function setEmpleadolicenciaid($empleadolicenciaid) {
        $this->empleadolicenciaid = $empleadolicenciaid;
    }

    public function setEmpleadolicenciavigencia($empleadolicenciavigencia) {
        $this->empleadolicenciavigencia = $empleadolicenciavigencia;
    }

    public function setVehiculoid($vehiculoid) {
        $this->vehiculoid = $vehiculoid;
    }

}

?>