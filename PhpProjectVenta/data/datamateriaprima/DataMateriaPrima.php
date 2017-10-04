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
        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $Tipomaterianuevo = $this->conexion->crearConexion()->query("INSERT INTO `tbtipomateriasprimas`(
                `tipomateriaprimacategoria`, `tipomateriaprimaestado`) VALUES (
                '" . $materiaprima->tipomateriaprimacategoria() . "','1');");


            $recuperandoIdtipomateriaprima = $this->conexion->crearConexion()->query("SELECT `tipomateriaid`FROM 
                `tbtipomateriasprimas` WHERE tipomateriaprimacategoria='" . $materiaprima->getTipomateriaprimacategoria() . "';");

            $con;
            while ($resultado = $recuperandoIdtipomateriaprima->fetch_assoc()) {
                $con = $resultado['tipomateriaprimaid'];
            }
            if (is_string($con)) {
                $materiaprima->setTipomateriaprimaid($con);
            }

            $insertarmateriaprima = $this->conexion->crearConexion()->query("INSERT INTO `tbmateriasprimas`(
                `tipomateriaprimaid`, materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, 
                `materiaprimacantidad`, `materiaprimaestado`) 
                VALUES 
                ('" . $materiaprima->getMateriaprimacodigo() . "',
                '" . $materiaprima->getMateriaprimaid() . "',
                '" . $materiaprima->getMateriaprimanombre() . "',
                '" . $materiaprima->getMateriaprimaprecio() . "',
                '" . $materiaprima->getMateriaprimacantidad() . "',
                '1');");

            $this->conexion->cerrarConexion();

            return $insertarmateriaprima;
        }
    }

    //modificar
    public function modificarMateriaPrima($materiaprima) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarmateriaprima = $this->conexion->crearConexion()->query("UPDATE `tbmateriasprimas` SET "
                    . "`materiasprimasnombre`='" . $materiaprima->getMateriaprimanombre()
                    . "`materiasprimasprecio`='" . $materiaprima->getMateriaprimaprecio() . "' WHERE materiaprimaid='"
                    . $materiaprima->getMateriaprimaid() . "';");

            $recuperandoIdtipomateriprima = $this->conexion->crearConexion()->query("SELECT `tipomateriaprimaid`
                FROM `tbmateriasprimas` WHERE 
                materiaprimaid='" . $materiaprima->getTipomateriaprimaid() . "';");

            $con;

            while ($resultado = $recuperandoIdtipomateriprima->fetch_assoc()) {
                $con = $resultado['materiaprimaid'];
            }
            if (is_string($con)) {
                $materiaprima->setTipomateriaprimaid($con);
            }

            $tipomateriaprimanuevo = $this->conexion->crearConexion()->query("UPDATE `tbtipomateriprimas` SET 
            `tipomanteriaprimacategoria`='" . $materiaprima->getTipomateriaprimacategoria() . "',
             WHERE personaid='" . $materiaprima->getTipomateriaprimaid() . "';");

            $this->conexion->cerrarConexion();

            return $modificarmateriaprima;
        }
    }

    //eliminar
    public function eliminarMateriaPrima($materiaprimaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $eliminarmateriaprima = $this->conexion->crearConexion()->query("UPDATE `tbmateriasprimas` SET "
                    . "`materiaprimaestado`= 0 WHERE materiaprimaid='" . $materiaprimaid . "';");

            $this->conexion->cerrarConexion();

            return $eliminarmateriaprima;
        }
    }

    //buscar
    public function buscarMateriaPrima($materiaprimaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $buscarmateriaprima = $this->conexion->crearConexion()->query("SELECT
              t.tipomateriaprimacategoria, 
              m.materiaprimaid, m.materiaprimacodigo, m.materiaprimanombre`, 
              m.materiaprimaprecio, m.materiaprimacantidad, m.tipomateriaprimaid
              FROM tbmateriasprimas m 
              INNER JOIN tbtipomateriasprimas t ON e.tipomateriaprimaid = m.tipomateriaprimaid
              WHERE t.tipomateriaprimacategoria ='" . $tipomateriaprimaid . "' 
              AND m.materiaprimaestado = 1 OR m.materiaprimaid='" . $materiaprimaid . "'
              AND t.tipomateriaprimaestado = 1 OR m.tipomateriaprimaid='" . $materiaprimaid . "");

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

            $mostrarmateriasprimas = $this->conexion->crearConexion()->query("SELECT materiaprimacodigo,
              materiaprimanombre,materiaprimaprecio,materiaprimacantidad,tipomateriaprimaid
              FROM tbmateriasprimas
              WHERE materiaprimaidestado=1");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarmateriasprimas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

?>
