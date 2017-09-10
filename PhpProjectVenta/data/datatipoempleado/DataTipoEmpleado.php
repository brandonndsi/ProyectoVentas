<?php

class DataTipoEmpleado {

    private $conexion;

    function DataTipoEmpleado() {
        include('../../data/dbconexion/Conexion.php');
        include_once '../../domain/tipoempleados/TipoEmpleados.php';
        $this->conexcion = new Conexion();
    }

    public function buscartipoempleado($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $tipo = $this->conexion->crearConexion()->query("CALL tipoempleadobuscar('$tipoempleado')");
            
            $this->conexion->cerrarConexion();
            while ($resultado = $tipo->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
