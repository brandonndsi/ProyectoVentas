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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $insertarproducto = $this->conexion->crearConexion()->query("INSERT INTO `tbproductos`(
            `productocodigo`, `productonombre`, `productoprecio`, `productoestado`) 
VALUES ('" . $producto->getProductoCodigo() . "','" . $producto->getProductonombre() . "',
'" . $producto->getProductoprecio() . "','1' );");

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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarproducto = $this->conexion->crearConexion()->query("UPDATE `tbproductos` 
                SET `productocodigo`='" . $producto->getProductoCodigo() . "',
                `productonombre`='" . $producto->getProductonombre() . "',
                `productoprecio`='" . $producto->getProductoprecio() . "'
                    WHERE productoid='" . $producto->getProductoid() . "'");

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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarproducto = $this->conexion->crearConexion()->query("DELETE  FROM tbproductos 
                where productoid='" . $productoid . "';");

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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();
            $buscarproducto = $this->conexion->crearConexion()->query("SELECT `productoid`,`productocodigo`, `productonombre`, `productoprecio` FROM `tbproductos` WHERE
productoid='" . $productoid . "' AND productoestado=1 OR productocodigo='" . $productoid . "' AND productoestado=1 OR productoprecio='" . $productoid . "' AND productoestado=1;");

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
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarproductos = $this->conexion->crearConexion()->query("SELECT * "
            . "FROM `tbproductos` WHERE productoestado=1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarproductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //funcion de cargar los ingredientes
    function mostrarMaterial() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $array = array();

            $mostrarmaterial = $this->conexion->crearConexion()->query("SELECT   `materiaprimanombre` "
            . "FROM `tbmateriasprimas` "
            . "WHERE materiaprimacantidad>=10 AND tipomateriaprimaid=1;");

            $this->conexion->cerrarConexion();

            while ($resultado = $mostrarmaterial->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
