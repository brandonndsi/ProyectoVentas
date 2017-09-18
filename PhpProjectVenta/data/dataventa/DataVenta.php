<?php

class DataVenta {

    private $conexion;

    function DataVenta() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/ventas/Ventas.php';
        $this->conexion = new Conexion();
    }

    function mostrarVenta() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarproductos = $this->conexion->crearConexion()->query("SELECT `productocodigo`, `productonombre` FROM `tbproductos` WHERE productoestado=1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarproductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

   
    
}