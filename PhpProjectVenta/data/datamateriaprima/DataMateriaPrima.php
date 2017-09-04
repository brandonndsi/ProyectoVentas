<?php

class DataMateriaPrima {

    private $conexion;

    function DataMateriaPrima() {
        include_once '../../data/dbconexion/Conexcion.php';
        include_once '../../domain/materiaprimas/MateriaPrimas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarMateriaPrima($materiaprima) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $insertarmateriaprima = $this->conexion->crearConexion()->query("INSERT INTO tbmateriasprimas(materiaprimaid,
            materiaprimanombre, materiaprimaprecio, tipomateriaprimaid, materiaprimaestado) VALUES (
                '" . $materiaprima->get_materiaprimaid() . "',
		'" . $materiaprima->get_materiaprimanombre() . "',
		'" . $materiaprima->get_materiaprimaprecio() . "',  
                '" . $materiaprima->get_tipomateriaprimaid() . "',      
		'" . $materiaprima->materiaprimaestado() . "')");

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

            $modificarempleado = $this->conexion->crearConexion()->query("UPDATE tbmateriasprimas SET 
		materiaprimaid='" . $materiaprima->get_materiaprimaid() . "',
		materiaprimanombre='" . $materiaprima->get_materiaprimanombre() . "',
                materiaprimaprecio='" . $materiaprima->get_materiaprimaprecio() . "',   
                tipomateriaprimaid='" . $materiaprima->get_tipomateriaprimaid() . "', 
                materiaprimaestado='" . $materiaprima->get_materiaprimaestado() . "',    
		WHERE materiaprimaid =" . $materiaprima->get_materiaprimaid() . "");

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

            $eliminarmateriaprima = $this->conexion->crearConexion()->query("CALL eliminarmateriaprima('$materiaprimaid')");

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

            $buscarmateriaprima = $this->conexion->crearConexion()->query("CALL buscarmateriaprima('$materiaprimaid')");

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

            $mostrarmateriasprimas = $this->conexion->crearConexion()->query("CALL mostrarmateriasprimas");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarmateriasprimas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
