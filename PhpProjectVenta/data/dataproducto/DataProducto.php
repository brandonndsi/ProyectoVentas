<?php

class DataProducto {

    private $conexion;

    function DataProducto() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/productos/Productos.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarProducto($producto) {

        if ($this->conexion->crearConexion()->set_charset('utf8')==true) {
            $insertarproducto = $this->conexion->crearConexion()->query("CALL productonuevo(
                '" . $producto->getProductoid() . " ',
		'" . $producto->getProductonombre() . "', 
		'" . $producto->getProductoprecio() . "')");

            $result = mysql_query($insertarproducto);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar
    public function modificarProducto($producto) {

        if ($this->conexion->crearConexion()->set_charset('utf8')==true) {

            $modificarproducto = $this->conexion->crearConexion()->query("CALL productoactualizar(
                '" . $producto->getProductoid() . " ',
		'" . $producto->getProductonombre() . "', 
		'" . $producto->getProductoprecio() . "')");

            $result = mysql_query($modificarproducto);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //eliminar
    public function eliminarProducto($productoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')==true) {

            $eliminarproducto = $this->conexion->crearConexion()->query("CALL productoeliminar('$productoid')");

            $result = mysql_query($eliminarproducto);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //buscar
    public function buscarProducto($productoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')==true) {

            $array = array();

            $buscarproducto = $this->conexion->crearConexion()->query("CALL productobuscar('$productoid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarproducto->fetch_assoc()) {
                array_push($array, $resultado);
            }
            if (!$array) {
                return false;
            } else {
                return $array;
            }
        }
    }

    //mostrar productos
    function mostrarProductos() {
        if ($this->conexion->crearConexion()->set_charset('utf8')==true) {

            $array = array();

            $mostrarproductos = $this->conexion->crearConexion()->query("CALL productosmostrar()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarproductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }
}