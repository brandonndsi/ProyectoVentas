<?php

class DataTipoEmpleado {

    private $conexion;

    function DataTipoEmpleado() {
        include('../dbconexion/Conexion.php');
        $this->conexcion = new Conexion();
    }

    function buscartipoempleado($tipoempleado) {
        
        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $tipo = $this->conexion->crearConexion()->query("CALL tipoempleadobuscar('$tipoempleado')");
        while ($resultado = $tipo->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }
}

