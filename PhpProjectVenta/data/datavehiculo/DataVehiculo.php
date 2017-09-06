<?php

class DataVehiculo {

    private $conexion;

    function DataVehiculo() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/vehiculos/Vehiculos.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarVehiculo($vehiculo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $insertarvehiculo = $this->conexion->crearConexion()->query("CALL insertarvehiculo(
                '" . $vehiculo->getVehiculoid() . " ',
		'" . $vehiculo->getVehiculoplaca() . "', 
                '" . $vehiculo->getVehiculomarca() . "',     
		'" . $vehiculo->getVehiculomodelo() . "')");

            $this->conexion->cerrarConexion();
            return $insertarvehiculo;
        }
    }

    //modificar
    public function modificarVehiculo($vehiculo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarvehiculo = $this->conexion->crearConexion()->query("CALL modificarvehiculo(
                '" . $vehiculo->getVehiculoid() . " ',
		'" . $vehiculo->getVehiculoplaca() . "', 
                '" . $vehiculo->getVehiculomarca() . "',     
		'" . $vehiculo->getVehiculomodelo() . "')");

            $this->conexion->cerrarConexion();
            return $modificarvehiculo;
        }
    }

    //eliminar
    public function eliminarVehiculo($vehiculoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarvehiculo = $this->conexion->crearConexion()->query("CALL eliminarvehiculo('$vehiculoid')");

            $this->conexion->cerrarConexion();
            return $eliminarvehiculo;
        }
    }

    //buscar
    public function buscarVehiculo($vehiculoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarvehiculo = $this->conexion->crearConexion()->query("CALL buscarvehiculo('$vehiculoid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarvehiculo->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar Vehiculo
    function mostrarVehiculos() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarproductos = $this->conexion->crearConexion()->query("CALL mostrarproductos()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarproductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }
}