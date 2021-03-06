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

            $insertarmateriaprima = $this->conexion->crearConexion()->query("INSERT INTO `tbmateriasprimas`( `materiaprimacodigo`, `materiaprimanombre`,
             `materiaprimaprecio`, `materiaprimacantidad`, `tipomateriaprimaid`, 
             `materiaprimaidestado`, `ultimacompra`) VALUES (
             '".$materiaprima->getMateriaprimacodigo()."',
             '".$materiaprima->getMateriaprimanombre()."',
             '".$materiaprima->getMateriaprimaprecio(). "',
             '".$materiaprima->getMateriaprimacantidad()."',
             '".$materiaprima->getMateriaprimatipoid()."',
             '1','".$materiaprima->getMateriaPrimaUltimaCompra()."')");


            /*$recuperandoIdtipomateriaprima = $this->conexion->crearConexion()->query("SELECT `tipomateriaid`
                FROM `tbtipomateriasprimas` WHERE 
                tipomateriaprimacategoria='" . $materiaprima->getTipomateriaprimacategoria() . "';");

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
*/
            $this->conexion->cerrarConexion();

            return $insertarmateriaprima;
        }
    }

    //modificar
    public function modificarMateriaPrima($materiaprima) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            /*UPDATE `tbmateriasprimas` SET `materiaprimaid`=[value-1],`materiaprimacodigo`=[value-2],`materiaprimanombre`=[value-3],`materiaprimaprecio`=[value-4],`materiaprimacantidad`=[value-5],`tipomateriaprimaid`=[value-6],`materiaprimaidestado`=[value-7],`ultimacompra`=[value-8] WHERE 1*/

            $modificarmateriaprima = $this->conexion->crearConexion()->query("
                UPDATE `tbmateriasprimas` SET
                `materiaprimacodigo`='".$materiaprima->getMateriaprimacodigo()."',
                `materiaprimanombre`='".$materiaprima->getMateriaprimanombre()."',
                `materiaprimaprecio`='".$materiaprima->getMateriaprimaprecio()."',
                `materiaprimacantidad`='".$materiaprima->getMateriaprimacantidad()."',
                `tipomateriaprimaid`='".$materiaprima->getMateriaprimatipoid()."',
                `ultimacompra`='".$materiaprima->getMateriaPrimaUltimaCompra()."'
                 WHERE materiaprimaid ='".$materiaprima->getMateriaprimaid()."';");

            /*$recuperandoIdtipomateriprima = $this->conexion->crearConexion()->query("SELECT `tipomateriaprimaid`
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
             WHERE personaid='" . $materiaprima->getTipomateriaprimaid() . "';");*/

            $this->conexion->cerrarConexion();

            return $modificarmateriaprima;
        }
    }

    //eliminar
    public function eliminarMateriaPrima($materiaprimaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarmateriaprima = $this->conexion->crearConexion()->query("UPDATE `tbmateriasprimas` SET `materiaprimaidestado`= 0 WHERE materiaprimaid='".$materiaprimaid."';");

            $this->conexion->cerrarConexion();

            return $eliminarmateriaprima;
        }
    }

    //buscar
    public function buscarMateriaPrima($materiaprimaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarmateriaprima = $this->conexion->crearConexion()->query("SELECT *
              FROM tbmateriasprimas m 
              INNER JOIN tbtipomateriasprimas t ON m.tipomateriaprimaid = t.tipomateriaprimaid
              WHERE m.materiaprimaid ='" . $materiaprimaid . "' 
              AND m.materiaprimaidestado = 1 ;");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarmateriaprima->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar materias primas
    public function mostrarMateriaPrima() {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarmateriasprimas = $this->conexion->crearConexion()->query("SELECT *
              FROM tbmateriasprimas
              WHERE materiaprimaidestado=1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarmateriasprimas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

?>
