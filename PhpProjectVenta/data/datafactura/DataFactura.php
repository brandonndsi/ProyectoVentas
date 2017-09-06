<?php

class DataFactura {

    private $conexion;

    function DataFactura() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/facturas/Facturas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarFactura($factura) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarfactura = $this->conexion->crearConexion()->query("INSERT INTO tbfacturas(facturaid,
            empleadoid, clienteid, ventafecha, ventabruta,ventaneta) VALUES (
                '" . $factura->get_facturaid() . "',
		'" . $factura->get_empleadoid() . "',
                '" . $factura->get_clienteid() . "', 
                '" . $factura->get_ventafecha() . "',
                '" . $factura->get_ventabruta() . "',       
		'" . $factura->get_ventaneta() . "')");

            $this->conexion->cerrarConexion();
            return $insertarfactura;
        }
    }

    //modificar
    public function modificarFactura($factura) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarfactura = $this->conexion->crearConexion()->query("UPDATE tbfacturas SET 
		facturaid='" . $factura->get_facturaid() . "',
		empleadoid='" . $factura->get_empleadoid() . "',
                clienteid='" . $factura->get_clienteid() . "', 
                ventafecha='" . $factura->get_ventafecha() . "',  
                ventabruta='" . $factura->get_ventabruta() . "', 
                ventaneta='" . $factura->get_ventaneta() . "',     
		WHERE facturaid =" . $factura->get_facturaid() . "");

            $this->conexion->cerrarConexion();
            return $modificarfactura;
        }
    }

    //eliminar
    public function eliminarFactura($facturaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarfactura = $this->conexion->crearConexion()->query("CALL eliminarfactura('$facturaid')");

            $this->conexion->cerrarConexion();
            return $eliminarfactura;
        }
    }

    //buscar
    public function buscarFactura($facturaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarfactura = $this->conexion->crearConexion()->query("CALL buscarfactura('$facturaid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarfactura->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar
    public function mostrarFacturas() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarfacturas = $this->conexion->crearConexion()->query("CALL mostrarfacturas()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarfacturas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
