<?php

class DataMateriaPrima {

    private $conexion;

    function DataMateriaPrima() {
        include_once '../dbconexion/Conexcion.php';
        $this->conexion = new Conexion();
    }

    //insertar
    function insertarMateriaPrima($materiaprima) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $insertarmateriaprima = $this->conexion->crearConexion()->query("INSERT INTO tbmateriasprimas(materiaprimaid,
            materiaprimanombre, materiaprimaprecio, tipomateriaprimaid) VALUES (
                '" . $materiaprima->get_materiaprimaid() . "',
		'" . $materiaprima->get_materiaprimanombre() . "',
		'" . $materiaprima->get_materiaprimaprecio() . "',  
		'" . $materiaprima->get_tipomateriaprimaid() . "')");

        $result = mysql_query($insertarmateriaprima);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //eliminar
    function eliminarMateriaPrima($materiaprimaid) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $eliminarmateriaprima = $this->conexion->crearConexion()->query("CALL eliminarmateriaprima('$materiaprimaid')");

        $result = mysql_query($eliminarmateriaprima);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //buscar
    function buscarMateriaPrima($materiaprimaid) {

        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $buscarmateriaprima = $this->conexion->crearConexion()->query("CALL buscarmateriaprima('$materiaprimaid')");

        while ($resultado = $buscarmateriaprima->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

    //modificar
    function modificarMateriaPrima($materiaprima) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $modificarempleado = $this->conexion->crearConexion()->query("UPDATE tbmateriasprimas SET 
		materiaprimaid='" . $materiaprima->get_materiaprimaid() . "',
		materiaprimanombre='" . $materiaprima->get_materiaprimanombre() . "',
                materiaprimaprecio='" . $materiaprima->get_materiaprimaprecio() . "',   
                tipomateriaprimaid='" . $materiaprima->get_tipomateriaprimaid() . "',     
		WHERE materiaprimaid =" . $materiaprima->get_materiaprimaid() . "");

        $result = mysql_query($modificarempleado);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //mostrar materias primas
    function mostrarMateriaPrima() {
        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $mostrarmateriasprimas = $this->conexion->crearConexion()->query("CALL mostrarmateriasprimas");

        while ($resultado = $mostrarmateriasprimas->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

}
