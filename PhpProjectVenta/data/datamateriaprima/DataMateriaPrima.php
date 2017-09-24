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

            $insertarmateriaprima = $this->conexion->crearConexion()->query("INSERT INTO `tbmateriasprimas`(`materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, `materiaprimacantidad`, `materiaprimaestado`) 
                VALUES 
                ('".$materiaprima->getMateriaprimacodigo()."',
                '".$materiaprima->getMateriaprimanombre()."',
                '".$materiaprima->getMateriaprimaprecio()."',
                '".$materiaprima->getMateriaprimacantidad()."',
                '1');");

            $this->conexion->cerrarConexion();
            if ($insertarmateriaprima==1) {
                return "true";
            } else {
                return "false";
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

            $eliminarmateriaprima = $this->conexion->crearConexion()->query("UPDATE `tbmateriasprimas` SET `materiaprimaestado`= 0 WHERE materiaprimaid='".$materiaprimaid."';");
            
            $this->conexion->cerrarConexion();
            if ($eliminarmateriaprima==1) {
                return "true";
            } else {
                return "false";
            }
        }
    }

    //buscar
    public function buscarMateriaPrima($materiaprimaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $buscarmateriaprima = $this->conexion->crearConexion()->query("SELECT `materiaprimaid`, `materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, `materiaprimacantidad`, `tipomateriaprimaid` FROM `tbmateriasprimas` WHERE materiaprimacantidad>=10 AND materiaprimaid='".$materiaprimaid."' OR materiaprimacantidad>=10 AND materiaprimacodigo ='".$materiaprimaid."';");

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

            $mostrarmateriasprimas = $this->conexion->crearConexion()->query("SELECT `materiaprimaid`, `materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, `materiaprimacantidad`, `tipomateriaprimaid` FROM `tbmateriasprimas` WHERE materiaprimacantidad>=10 AND materiaprimaestado = 1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarmateriasprimas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }



}
/*
$dato= new DataMateriaPrima();
$m=new MateriasPrimas(null,'m32','mmm','1452','10',null);
$b=$dato->insertarMateriaPrima($m);
print_r($b);*/

?>
