<?php

/**
 * Description of Vehiculos
 *
 * @author Juancho
 */
class Vehiculos {
    
    private $vehiculoid;
    private $vehiculoplaca;
    Private $vehiculomarca;
    Private $vehiculomodelo;

    public function Vehiculos($vehiculoid, $vehiculoplaca, $vehiculomarca, $vehiculomodelo) {
        $this->vehiculoid = $vehiculoid;
        $this->vehiculoplaca = $vehiculoplaca;
        $this->vehiculomarca = $vehiculomarca;
        $this->vehiculomodelo = $vehiculomodelo;
    }
    public function getVehiculoid() {
        return $this->vehiculoid;
    }

    public function getVehiculoplaca() {
        return $this->vehiculoplaca;
    }

    public function getVehiculomarca() {
        return $this->vehiculomarca;
    }

    public function getVehiculomodelo() {
        return $this->vehiculomodelo;
    }

    public function setVehiculoid($vehiculoid) {
        $this->vehiculoid = $vehiculoid;
    }

    public function setVehiculoplaca($vehiculoplaca) {
        $this->vehiculoplaca = $vehiculoplaca;
    }

    public function setVehiculomarca($vehiculomarca) {
        $this->vehiculomarca = $vehiculomarca;
    }

    public function setVehiculomodelo($vehiculomodelo) {
        $this->vehiculomodelo = $vehiculomodelo;
    }

}
?>