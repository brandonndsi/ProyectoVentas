<?php

/**
 * Description of dat
 *
 * @author Juancho
 */
class DataMilla {

    private $conexion;

    function DataMilla() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/millas/Millas.php';
        $this->conexion = new Conexion();
    }

    public function insertarMilla($milla) {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            
            $insertarmilla = $this->conexion->crearConexion()->query("INSERT INTO `tbmillas`(
            `clienteid`, `millacantidad`, `millaestado`) 
            VALUES ('" . $milla->getClienteid() . "','" . $milla->getMillaCantidad() . "',
            '1' );");

            $result = mysql_query($insertarmilla);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

}
