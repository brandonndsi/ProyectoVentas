<?php

class DataTipoEmpleado {

    private $conexion;

    function DataTipoEmpleado() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/tipoempleados/TipoEmpleados.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarTipo($tipo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $insertartipo = $this->conexion->crearConexion()->query("INSERT INTO `tbtipoempleados`(`tipoempleado`, `tipoempleadosalariobase`, `tipoempleadodescripcion`, `tipoempleadohoraextra`,`tipoempleadoestado`)
                VALUES ('" . $tipo->getTipoEmpleado() . "',
                '" . $tipo->getTipoempleadosalariobase() . "',
                '" . $tipo->getTipoempleadodescripcion() . "',
                '" . $tipo->getTipoempleadohoraextra() . "',1);");

            $result = mysql_query($insertartipo);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar
    public function modificarTipo($tipo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificartipo = $this->conexion->crearConexion()->query("UPDATE `tbtipoempleados` SET 
            `tipoempleadosalariobase`='" . $tipo->getTipoempleadosalariobase() . "',
            `tipoempleadodescripcion`='" . $tipo->getTipoempleadodescripcion() . "',
            `tipoempleadohoraextra`='" . $tipo->getTipoempleadohoraextra() . "'
            WHERE tipoempleado='" . $tipo->getTipoEmpleado() . "';");

            $result = mysql_query($modificartipo);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //eliminar
    public function eliminarTipo($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminartipo = $this->conexion->crearConexion()->query("UPDATE `tbtipoempleados` SET `tipoempleadoestado`= 0 "
            . "WHERE tipoempleado='".$tipoempleado."';");


            $result = mysql_query($eliminartipo);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //buscar
    public function buscarTipo($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarempleado = $this->conexion->crearConexion()->query("SELECT `tipoempleado`, `tipoempleadosalariobase`, `tipoempleadodescripcion`, `tipoempleadohoraextra` FROM
             `tbtipoempleados` WHERE tipoempleado='" . $tipoempleado . "' AND tipoempleadoestado = 1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarempleado->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar productos
    function mostrarTipo() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarempleados = $this->conexion->crearConexion()->query("SELECT * FROM `tbtipoempleados` Where tipoempleadoestado = 1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarempleados->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
