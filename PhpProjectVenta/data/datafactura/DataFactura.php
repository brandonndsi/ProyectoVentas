<?php

class DataFactura {

    private $conexion;

    function DataFactura() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/facturas/Facturas.php';
        $this->conexion = new Conexion();
    }

    function mostrarFactura() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarproductos = $this->conexion->crearConexion()->query("SELECT facturaid,facturafecha,empleadoid
              FROM tbfacturas
              WHERE facturaestado=1");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarproductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

   
    
}