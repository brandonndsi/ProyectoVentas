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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarzona = $this->conexion->crearConexion()->query("INSERT INTO `tbzonas`(
              `zonaid`, `zonanombre`, `zonaprecio` , `zonaestado`) VALUES (
                '" . $zona->getZonaid() . " ',
		'" . $zona->getZonanombre() . "', 
		'" . $zona->getZonaprecio() . "',
                '1'");       

            $result = mysql_query($insertarzona);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar
    function modificarZona($zona) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarzona = $this->conexion->crearConexion()->query("UPDATE `tbzonas` "
                    . "SET `zonanombre`='" . $zona->getZonanombre() . "',"
                    . "`zonaprecio`='" . $zona->getZonaprecio() . "'"
                    . " WHERE zonaid='" . $zona->getZonaid() . "'
                        AND zonaestado=1");

            $result = mysql_query($modificarzona);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //eliminar
    function eliminarZona($zonaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarzona = $this->conexion->crearConexion()->query("UPDATE `tbzonas` "
            . "SET `zonaestado`= 0 WHERE zonaid='" . $zonaid . "';");

             return $eliminarzona;
        }
    }

    //buscar
    function buscarZona($zonaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarzona = $this->conexion->crearConexion()->query("SELECT zonanombre, zonaprecio FROM tbzonas
            WHERE zonaid='" . $zonaid . "' AND zonaestado='1';");
            

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarzona->fetch_assoc()) {
                array_push($array, $resultado);
            }
            if (!$array) {
                return false;
            } else {
                return $array;
            }
        }
    }

    //mostrar zonas
    function mostrarZona() {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarzonas = $this->conexion->crearConexion()->query("SELECT `zonaid`, 
             .`zonanombre`, `zonaprecio` FROM `tbzonas` WHERE zonaestado=1;");
            

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarzonas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
