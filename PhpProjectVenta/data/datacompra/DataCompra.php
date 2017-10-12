<?php

class DataCompra {

    private $conexion;

    function DataCompra() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/ventas/Ventas.php';
        $this->conexion = new Conexion();
    }

    function mostrarCompra() {
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
    /**
     * Lo que hace es pasar los datos de la consulta a un array.
     * @return [Array] [darray con la informacion de producto]
     */
    function cargarProducto(){
        if($this->conexion->crearConexion()->set_charset('utf8')){
            $Array= array();
            $mostrarProductos = $this->conexion->crearConexion()->query("SELECT * FROM `tbproductos` WHERE productoestado=1;");/*Lo que hace es hacer la consulta  a la base de datos*/

            $this->conexion->cerrarConexion();/*lo que se hace es cerrar la conexion ya obtenido los datos*/
            while($resultado =$mostrarProductos->fetch_assoc()){
                array_push($Array,$resultado);
            }
            return $Array;
        }
    }
   
    function agregarCompra($lista){

        if($this->conexion->crearConexion()->set_charset('utf8')){

            $indexVenta = $this->conexion->crearConexion()->query("SELECT MAX(compraid) FROM `tbcompras`");
            while ($lista <= $p) {
                
                $productoid= $this->conexion->crearConexion()->query("SELECT `productoid` FROM `tbproductos` WHERE productocodigo='".$p->codigo."' AND productoestado=1;");

                $this->conexion->crearConexion()->query("INSERT INTO `tbcompras`(`compraid`, `productoid`, `compracantidadproducto`, `compraestado`) VALUES ('".$indexVenta."','".$productoid."','".$p->cantidad."','1');");
            }
        }
    } 
}