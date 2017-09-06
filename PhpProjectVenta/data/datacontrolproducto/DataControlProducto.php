<?php

class DataControlProducto {

    private $conexion;

    function DataControlProducto() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/controlproductos/ControlProductos.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarCotrolProducto($controlproducto) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarfactura = $this->conexion->crearConexion()->query("INSERT INTO tbcontrolproductos(productoid,
            materiaprimaid) VALUES (
                '" . $controlproducto->get_productoid() . "',     
		'" . $controlproducto->get_materiaprimaid() . "')");

            $this->conexion->cerrarConexion();
            return $insertarfactura;
        }
    }

    //modificar
    public function modificarCotrolProducto($controlproducto) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarfactura = $this->conexion->crearConexion()->query("UPDATE tbcontrolproductos SET 
		productoid='" . $controlproducto->get_productoid() . "',
		materiaprimaid='" . $controlproducto->get_materiaprimaid() . "',   
		WHERE productoid =" . $controlproducto->get_productoid() . "");

            $this->conexion->cerrarConexion();
            return $modificarfactura;
        }
    }

    //eliminar
    public function eliminarCotrolProducto($productoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarcontrolproducto = $this->conexion->crearConexion()->query("CALL eliminarcontrolproducto('$productoid')");

            $this->conexion->cerrarConexion();
            return $eliminarcontrolproducto;
        }
    }

    //buscar
    public function buscarCotrolProducto($productoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarcontrolproducto = $this->conexion->crearConexion()->query("CALL buscarcontrolproducto('$productoid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarcontrolproducto->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar
    public function mostrarCotrolProductos() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarcontrolproductos = $this->conexion->crearConexion()->query("CALL mostrarcontrolproductos()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarcontrolproductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
