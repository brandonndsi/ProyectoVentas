<?php

class DataZona {

    private $conexion;

    function DataZona() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/zonas/Zonas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    function insertarZona($zona) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $insertarproducto = $this->conexion->crearConexion()->query("CALL productonuevo(
                '".$zona->getProductoid()." ',
		'".$zona->getProductonombre()."', 
		'".$zona->getProductoprecio()."')");

       /* if (!$result) {
            return false;
        } else {
            return $result;
        }*/
        return $insertarproducto;
    }

    //eliminar
    function eliminarZona($zonaid) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $eliminarmateriaprima = $this->conexion->crearConexion()->query("CALL productoeliminar('$zonaid')");

        $result = mysql_query($eliminarmateriaprima);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //buscar
    function buscarZona($zonaid) {

        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $buscarproducto = $this->conexion->crearConexion()->query("CALL productobuscar('$zonaid')");

        while ($resultado = $buscarproducto->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

    //modificar
    function modificarZona($zona) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $modificarproducto = $this->conexion->crearConexion()->query("CALL productoactualizar(
                '".$zona->getProductoid()." ',
		'".$zona->getProductonombre()."', 
		'".$zona->getProductoprecio()."')");

        $result = mysql_query($modificarproducto);
        return $result;
        /*if (!$result) {
            return false;
        } else {
            return $result;
        }*/
    }

    //mostrar productos
    function mostrarZona() {
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