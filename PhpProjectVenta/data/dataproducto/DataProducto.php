<?php

class DataProducto {

    private $conexion;

    function DataProducto() {
        include_once '../dbconexion/Conexcion.php';
        $this->conexion = new Conexion();
    }

    //insertar
    function insertarProducto($producto) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $insertarproducto = $this->conexion->crearConexion()->query("INSERT INTO tbproductos(productoid,
            productonombre, materiaprimaprecio) VALUES (
                '" . $producto->get_productoid() . "',
		'" . $producto->get_productonombre() . "', 
		'" . $producto->get_productoprecio() . "')");

        $result = mysql_query($insertarproducto);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //eliminar
    function eliminarProducto($productoid) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $eliminarmateriaprima = $this->conexion->crearConexion()->query("CALL eliminarproducto('$productoid')");

        $result = mysql_query($eliminarmateriaprima);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //buscar
    function buscarProducto($productoid) {

        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $buscarproducto = $this->conexion->crearConexion()->query("CALL buscarproducto('$productoid')");

        while ($resultado = $buscarproducto->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

    //modificar
    function modificarProducto($producto) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $modificarproducto = $this->conexion->crearConexion()->query("UPDATE tbproductos SET 
		productoid='" . $producto->get_productoid() . "',
		productonombre='" . $producto->get_productonombre() . "',
                productoprecio='" . $producto->get_productoprecio() . "',       
		WHERE productoid =" . $producto->get_productoid() . "");

        $result = mysql_query($modificarproducto);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //mostrar productos
    function mostrarProductos() {
        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $mostrarproductos = $this->conexion->crearConexion()->query("CALL mostrarproductos");

        while ($resultado = $mostrarproductos->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

}
