<?php

class DataMateriaPrima {

    private $conexion;

    function DataMateriaPrima() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/materiaprimas/MateriaPrimas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarMateriaPrima($materiaprima) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $insertarmateriaprima = $this->conexion->crearConexion()->query("INSERT INTO `tbmateriasprimas`(`materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, `materiaprimacantidad`, `tipomateriaprimaid`) 
                VALUES 
                ('".$materiaprima->getMateriaprimacodigo()."',
                '".$materiaprima->getMateriaprimanombre()."',
                '".$materiaprima->getMateriaprimaprecio()."',
                '".$materiaprima->getMateriaprimacantidad()."',
                '".$materiaprima->getMateriaprimatipoid()."');");

            $result = mysql_query($insertarmateriaprima);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar
    public function modificarMateriaPrima($materiaprima) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $modificarempleado = $this->conexion->crearConexion()->query("UPDATE `tbmateriasprimas` SET 
                `materiaprimacodigo`='".$materiaprima->getMateriaprimacodigo()."',
                `materiaprimanombre`='".$materiaprima->getMateriaprimanombre()."',
                `materiaprimaprecio`='".$materiaprima->getMateriaprimaprecio()."',
                `materiaprimacantidad`='".$materiaprima->getMateriaprimacantidad()."',
                `tipomateriaprimaid`='".$materiaprima->getMateriaprimatipoid()."' 
                WHERE materiaprimaid='".$materiaprima->getMateriaprimaid()."';");

            $result = mysql_query($modificarempleado);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //eliminar
    public function eliminarMateriaPrima($materiaprimaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $eliminarmateriaprima = $this->conexion->crearConexion()->query("DELETE FROM `tbmateriasprimas` WHERE materiaprimaid='".$materiaprimaid."';");

            $result = mysql_query($eliminarmateriaprima);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //buscar
    public function buscarMateriaPrima($materiaprimaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $buscarmateriaprima = $this->conexion->crearConexion()->query("SELECT `materiaprimaid`, `materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, `materiaprimacantidad`, `tipomateriaprimaid` FROM `tbmateriasprimas` WHERE materiaprimacantidad>=10 AND materiaprimaid='".$materiaprimaid."';");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarmateriaprima->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar materias primas
    public function mostrarMateriaPrima() {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $mostrarmateriasprimas = $this->conexion->crearConexion()->query("SELECT `materiaprimaid`, `materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, `materiaprimacantidad`, `tipomateriaprimaid` FROM `tbmateriasprimas` WHERE materiaprimacantidad>=10;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarmateriasprimas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
