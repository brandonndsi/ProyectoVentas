<?php
/**
 * Description of Persona
 *
 * @author Brandon
 */

class TipoEmpleados {
    
    private $tipoEmpleado;
    private $tipoempleadosalariobase;
    private $tipoempleadodescripcion;
    private $tipoempleadohoraextra;
   
    public function TIpoEmpleados($tipoEmpleado, $tipoempleadosalariobase, $tipoempleadodescripcion, $tipoempleadohoraextra) {
        $this->tipoEmpleado = $tipoEmpleado;
        $this->tipoempleadosalariobase = $tipoempleadosalariobase;
        $this->tipoempleadodescripcion = $tipoempleadodescripcion;
        $this->tipoempleadohoraextra = $tipoempleadohoraextra;
    }

    public function getTipoEmpleado() {
        return $this->tipoEmpleado;
    }

    public function getTipoempleadosalariobase() {
        return $this->tipoempleadosalariobase;
    }

    public function getTipoempleadodescripcion() {
        return $this->tipoempleadodescripcion;
    }

    public function getTipoempleadohoraextra() {
        return $this->tipoempleadohoraextra;
    }

    public function setTipoEmpleado($tipoEmpleado) {
        $this->tipoEmpleado = $tipoEmpleado;
    }

    public function setTipoempleadosalariobase($tipoempleadosalariobase) {
        $this->tipoempleadosalariobase = $tipoempleadosalariobase;
    }

    public function setTipoempleadodescripcion($tipoempleadodescripcion) {
        $this->tipoempleadodescripcion = $tipoempleadodescripcion;
    }

    public function setTipoempleadohoraextra($tipoempleadohoraextra) {
        $this->tipoempleadohoraextra = $tipoempleadohoraextra;
    }


    
}
?>