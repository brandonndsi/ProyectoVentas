<?php

class DataZona {

    private $conexion;

    function DataZona() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/zonas/Zonas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    function insertarZona($zona) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarzona = $this->conexion->crearConexion()->query("CALL insertarzona(
                '" . $zona->getZonaid() . " ',
		'" . $zona->getZonanombre() . "', 
		'" . $zona->getZonaprecio() . "')");

            $this->conexion->cerrarConexion();
            return $insertarzona;
        }
    }

    //modificar
    function modificarZona($zona) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarzona = $this->conexion->crearConexion()->query("CALL modificarzona(
                '" . $zona->getZonaid() . " ',
		'" . $zona->getZonanombre() . "', 
		'" . $zona->getZonaprecio() . "')");

            $this->conexion->cerrarConexion();
            return $modificarzona;
        }
    }
    
    //eliminar
    function eliminarZona($zonaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $eliminarzona = $this->conexion->crearConexion()->query("CALL eliminarzona('$zonaid')");

            $this->conexion->cerrarConexion();
            return $eliminarzona;
        }
    }

    //buscar
    function buscarZona($zonaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarzona = $this->conexion->crearConexion()->query("CALL buscarzona('$zonaid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarzona->fetch_assoc()) {
                array_push($array, $resultado);
            }
            if (!$array) {
                return false;
            } else {
                return $array;
            }
        }
    }

    //mostrar zonas
    function mostrarZona() {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarzonas = $this->conexion->crearConexion()->query("CALL mostrarzonas()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarzonas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            if (!$array) {
                return false;
            } else {
                return $array;
            }
        }
    }
}
