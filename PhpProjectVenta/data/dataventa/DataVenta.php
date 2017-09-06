<?php

class DataVenta {

    private $conexion;

    function DataVenta() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/ventas/Ventas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarVenta($venta) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarventa = $this->conexion->crearConexion()->query("INSERT INTO tbventas(ventaid,
            facturaid, productoid, facturacantidadproducto) VALUES (
                '" . $venta->get_ventaid() . "',
		'" . $venta->get_facturaid() . "',
                '" . $venta->get_productoid() . "',        
		'" . $venta->get_facturacantidadproducto() . "')");

            $this->conexion->cerrarConexion();
            return $insertarventa;
        }
    }

    //modificar
    public function modificarVenta($venta) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarventa = $this->conexion->crearConexion()->query("UPDATE tbventas SET 
		ventaid='" . $venta->get_ventaid() . "',
		facturaid='" . $venta->get_facturaid() . "',
                productoid='" . $venta->get_productoid() . "', 
                facturacantidadproducto='" . $venta->get_facturacantidadproducto() . "',     
		WHERE ventaid =" . $venta->get_ventaid() . "");

            $this->conexion->cerrarConexion();
            return $modificarventa;
        }
    }

    //eliminar
    public function eliminarVenta($ventaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarventa = $this->conexion->crearConexion()->query("CALL eliminarventa('$ventaid')");

            $this->conexion->cerrarConexion();
            return $eliminarventa;
        }
    }

    //buscar
    public function buscarVenta($ventaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarventa = $this->conexion->crearConexion()->query("CALL buscarventa('$ventaid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarventa->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar
    public function mostrarVenta() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarventas = $this->conexion->crearConexion()->query("CALL mostrarventas()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarventas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
