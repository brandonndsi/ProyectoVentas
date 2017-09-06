<?php

class DataTipoMateriasPrimas {

    private $conexion;

    function DataTipoMateriasPrimas() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/materiaprimas/MateriaPrimas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarTipoMateriaPrima($tipomateriaprima) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertartipomateriaprima= $this->conexion->crearConexion()->query("INSERT INTO tbtipomateriasprimas(tipomateriaprimaid,
            tipomateriaprimacategoria) VALUES (
                '" . $tipomateriaprima->get_tipomateriaprimaid() . "',   
		'" . $tipomateriaprima->get_tipomateriaprimacategoria() . "')");

            $this->conexion->cerrarConexion();
            return $insertartipomateriaprima;
        }
    }

    //modificar
    public function modificarTipoMateriaPrima($tipomateriaprima) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificartipomateriaprima = $this->conexion->crearConexion()->query("UPDATE tbtipomateriasprimas SET 
		tipomateriaprimaid='" . $tipomateriaprima->get_tipomateriaprimaid() . "',
		tipomateriaprimacategoria='" . $tipomateriaprima->get_tipomateriaprimacategoria() . "',   
		WHERE tipomateriaprimaid =" . $tipomateriaprima->get_tipomateriaprimaid() . "");

            $this->conexion->cerrarConexion();
            return $modificartipomateriaprima;
        }
    }

    //eliminar
    public function eliminarTipoMateriaPrima($tipomateriaprimaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminartipomateriaprima = $this->conexion->crearConexion()->query("CALL eliminartipomateriaprima('$tipomateriaprimaid')");

            $this->conexion->cerrarConexion();
            return $eliminartipomateriaprima;
        }
    }

    //buscar
    public function buscarTipoMateriaPrima($tipomateriaprimaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscartipomateriaprima = $this->conexion->crearConexion()->query("CALL buscartipomateriaprima('$tipomateriaprimaid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscartipomateriaprima->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar 
    public function mostrarTipoMateriasPrimas() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrartipomateriasprimas = $this->conexion->crearConexion()->query("CALL mostrartipomateriasprimas()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrartipomateriasprimas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
