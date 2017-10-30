<?php

class DataCategoriaProducto {

        private $conexion;

    function DataCategoriaProducto() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/categoriaproducto/CategoriaProducto.php';
        $this->conexion = new Conexion();
    }

    //insertar categoria producto
    public function insertarCategoriaProducto($categoriaproducto) {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            /*Para ingresar nueva persona en la base de datos.*/
           $NuevaCategoriaProducto= $this->conexion->crearConexion()->query("INSERT INTO 
            `tbcategoriaproducto`(`categoriaproductonombre`, 
            `categoriaproductoestado`) VALUES 
            ('".$categoriaProducto->getCategoriaProductoNombre()."',
            '".$categoriaProducto->getCategoriaProductoEstado()."');");
           $this->conexion->cerrarConexion();
        
        return $NuevaCategoriaProducto;
         
        }
    }

    //modificar categoria producto
    public function modificarCategoriaProducto($categoriaProducto) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            /*actualiza el nuevo cliente a la base de datos*/
            $modificarCategoriaProducto=$this->conexion->crearConexion()->query("UPDATE `tbcategoriaproducto` SET 
            `categoriaproductonombre`='".$categoriaProducto->getCategoriaProductoNombre()."',
            `categoriaproductoestado`='".$categoriaProducto->getCategoriaProductoEstado()."' 
                WHERE categoriaproductoid='".$categoriaProducto->getCategoriaProductoId()."';");

        $this->conexion->cerrarConexion();

        return $modificarCategoriaProducto;
         
        }
    }

    //eliminar categoria producto
    /*public function eliminarCategoriaProducto($categoriaproducto) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarCategoriaProducto = $this->conexion->crearConexion()->query("");

            return $eliminarCategoriaProducto;
        }
    }
*/
    //buscar categoria producto
    public function buscarCategoriaProducto($categoriaProductoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarCategoriaProducto= $this->conexion->crearConexion()->query("SELECT * FROM `tbcategoriaproducto` WHERE categoriaproductoid='".$categoriaproductoid."'");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarCategoriaProducto->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar categoria producto
    public function mostrarCategoriaProducto() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarCategoriaProducto = $this->conexion->crearConexion()->query("SELECT * FROM `tbcategoriaproducto`");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarCategoriaProducto->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}


?>