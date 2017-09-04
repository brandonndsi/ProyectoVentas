<?php

class DataProducto {

    private $conexion;

    function DataProducto() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/productos/Productos.php';
        $this->conexion = new Conexion();
    }

    //insertar
    function insertarProducto($producto) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $insertarproducto = $this->conexion->crearConexion()->query("CALL productonuevo(
                '".$producto->getProductoid()." ',
		'".$producto->getProductonombre()."', 
		'".$producto->getProductoprecio()."')");

       /* if (!$result) {
            return false;
        } else {
            return $result;
        }*/
        return $insertarproducto;
    }

    //eliminar
    function eliminarProducto($productoid) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $eliminarmateriaprima = $this->conexion->crearConexion()->query("CALL productoeliminar('$productoid')");

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

        $buscarproducto = $this->conexion->crearConexion()->query("CALL productobuscar('$productoid')");

        while ($resultado = $buscarproducto->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

    //modificar
    function modificarProducto($producto) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $modificarproducto = $this->conexion->crearConexion()->query("CALL productoactualizar(
                '".$producto->getProductoid()." ',
		'".$producto->getProductonombre()."', 
		'".$producto->getProductoprecio()."')");

        $result = mysql_query($modificarproducto);
        return $result;
        /*if (!$result) {
            return false;
        } else {
            return $result;
        }*/
    }

    //mostrar productos
    function mostrarProductos() {
        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $mostrarproductos = $this->conexion->crearConexion()->query("CALL productosmostrar()");

        while ($resultado = $mostrarproductos->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

}
/*$da=new DataProducto();
//$pro=new Productos('P0','Rico', '45555');
$s=$da->eliminarProducto('p23');
print_r($s);*/
?>