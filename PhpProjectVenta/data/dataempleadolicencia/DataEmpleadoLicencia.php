<?php

class DataEmpleadoLicencia {

    private $conexion;

    function DataEmpleadoLicencia() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/empleadosliciencias/EmpleadosLiciencias.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarEmpleadoLicencia($empleadolicencia) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $insertarempleadolicencia = $this->conexion->crearConexion()->query("CALL insertarempleadolicencia(
                '" . $empleadolicencia->getEmpleadolicenciaid() . " ',
		'" . $empleadolicencia->getEmpleadolicenciavigencia() . "', 
		'" . $empleadolicencia->getVehiculoid() . "')");

            $this->conexion->cerrarConexion();
            return $insertarempleadolicencia;
        }
    }

    //modificar
    public function modificarEmpleadoLicencia($empleadolicencia) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarempleadolicencia = $this->conexion->crearConexion()->query("CALL modificarempleadolicencia(
                '" . $empleadolicencia->getEmpleadolicenciaid() . " ',
		'" . $empleadolicencia->getEmpleadolicenciavigencia() . "', 
		'" . $empleadolicencia->getVehiculoid() . "')");

            $this->conexion->cerrarConexion();
            return $modificarempleadolicencia;
        }
    }

    //eliminar
    public function eliminarEmpleadoLicencia($empleadolicenciaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarempleadolicencia = $this->conexion->crearConexion()->query("CALL eliminarempleadolicencia('$empleadolicenciaid')");

            $this->conexion->cerrarConexion();
            return $eliminarempleadolicencia;
        }
    }

    //buscar
    public function buscarEmpleadoLicencia($empleadolicenciaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarempleadolicencia = $this->conexion->crearConexion()->query("CALL buscarempleadolicencia('$empleadolicenciaid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarempleadolicencia->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar
    function mostrarEmpleadosLicencias() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarempleadoslicencias = $this->conexion->crearConexion()->query("CALL mostrarempleadoslicencias()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarempleadoslicencias->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }
}