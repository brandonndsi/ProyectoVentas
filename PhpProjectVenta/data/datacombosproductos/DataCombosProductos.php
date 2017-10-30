<?php

class DataCombosProductos {

    private $conexion;

    function DataCombosProductos() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../..//domain/combosproductos/CombosProductos.php';
        $this->conexion = new Conexion();
    }

    //insertar Combo productos
    public function insertarCombosProductos($combosproductos) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarCombosProductos= "INSERT INTO `tbcombosproductos`(`combosproductosid`, `combosid`, `productoid`) VALUES (
            '".$combosproductos->getCombosProductosId()."',
            '".$combosproductos->getCombosId()."',
            '".$combosproductos->getProductoId()."' )";

            $result = mysql_query($insertarCombosProductos);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar Combo productos
    public function modificarCombosProductos($combosproductos){

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarCombosProductos = "UPDATE `tbcombosproductos` SET
             `combosid`='".$combosproductos->getCombosId()."',
             `productoid`='".$combosproductos->getProductoId()."' 
             WHERE combosproductosid='".$combosproductos->getCombosProductosId()."'";

            $result = mysql_query($modificarCombosProductos);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //eliminar Combo productos
    Public function eliminarCombosproductos($combosproductosid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarCombosProductos= "DELETE FROM `tbcombosproductos` WHERE combosproductosid='".$combosproductosid."';";

            $result = mysql_query($eliminarCombosProductos);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //buscar una combo productos
    Public function buscarCombo($combosproductosid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarCombosProductos = $this->conexion->crearConexion()->query("SELECT * FROM `tbcombosproductos` WHERE combosproductosid='".$combosproductosid."';");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarCombosProductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar las combos productos
    public function mostrarCombosproductos() {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarCombosProductos = $this->conexion->crearConexion()->query("SELECT * FROM `tbcombosproductos` ;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarCombosProductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

?>