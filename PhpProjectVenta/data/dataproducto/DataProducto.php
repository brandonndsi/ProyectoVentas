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
            `productocodigo`, `productonombre`,`tamanoid`,`productodescripcion`, `productoprecio`, `productoestado`) 
            VALUES ('" . $producto->getProductoCodigo() . "','" . $producto->getProductonombre() . "',
            '" . $producto->getProductotamano() . "','" . $producto->getProductodescripcion() . "',    
            '" . $producto->getProductoprecio() . "','1' );");

            $result = $insertarproducto;
            $this->conexion->cerrarConexion();

            return $result;
        }
    }

    //modificar
    public function modificarProducto($producto) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarproducto = $this->conexion->crearConexion()->query("UPDATE `tbproductos` 
                SET `productocodigo`='" . $producto->getProductoCodigo() . "',
                `productonombre`='" . $producto->getProductonombre() . "',
                `tamanoid`='" . $producto->getProductotamano() . "',
                `productodescripcion`='" . $producto->getProductodescripcion() . "',    
                `productoprecio`='" . $producto->getProductoprecio() . "'
                    WHERE productoid='" . $producto->getProductoid() . "'");

            $result = $modificarproducto;
            $this->conexion->cerrarConexion();

            return $result;
        }
    }

    //eliminar
    public function eliminarProducto($productoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarproducto = $this->conexion->crearConexion()->query("UPDATE `tbproductos` SET `productoestado`=0 WHERE productoid='" . $productoid . "';");

            $this->conexion->cerrarConexion();
            return $eliminarproducto;
        }
    }

    //buscar
    public function buscarProducto($productoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();
            $buscarproducto = $this->conexion->crearConexion()->query("SELECT p.productoid,p.productocodigo, 
                p.productonombre, t.tamanonombre, p.productodescripcion, p.productoprecio FROM tbproductos p 
                INNER JOIN tbtamano t ON t.tamanoid = p.tamanoid
                WHERE productoid='" . "$productoid" . "' AND productoestado=1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarproducto->fetch_assoc()) {
                array_push($array, $resultado);
            }

            return $array;
        }
    }

    //mostrar productos
    function mostrarProductos() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarproductos = $this->conexion->crearConexion()->query("SELECT p.productoid, c.categoriaproductonombre, 
                p.productocodigo, p.productocantidad, 
                p.productonombre, t.tamanonombre, p.productodescripcion, p.productoprecio FROM tbproductos p 
                INNER JOIN tbtamano t ON t.tamanoid = p.tamanoid
                INNER JOIN tbcategoriaproducto c ON c.categoriaproductoid = p.categoriaproductoid
                WHERE productoestado=1;");
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
